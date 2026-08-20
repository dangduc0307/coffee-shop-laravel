<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AdminPasswordResetController extends Controller
{
    /**
     * Hiển thị form nhập email
     */
    public function showLinkRequestForm()
    {
        return view('admin.auth.forgot-password');
    }


    /**
     * Gửi email reset password
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
            ],
        ]);


        $status = Password::sendResetLink(
            $request->only('email')
        );


        if ($status === Password::RESET_LINK_SENT) {

            return back()->with(
                'status',
                'Link đặt lại mật khẩu đã được gửi vào email của bạn.'
            );
        }


        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => __($status),
            ]);
    }


    /**
     * Hiển thị form nhập mật khẩu mới
     */
    public function showResetForm(Request $request, string $token)
    {
        return view('admin.auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }


    /**
     * Cập nhật mật khẩu mới
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => [
                'required',
            ],

            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [

            'email.required' => 'Vui lòng nhập email.',

            'email.email' => 'Email không hợp lệ.',

            'password.required' => 'Vui lòng nhập mật khẩu mới.',

            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',

            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',

        ]);


        $status = Password::reset(
            $request->only(
                'email',
                'password',
                'password_confirmation',
                'token'
            ),

            function ($user, $password) {

                $user->password = $password;

                $user->setRememberToken(
                    Str::random(60)
                );

                $user->save();
            }
        );


        if ($status === Password::PASSWORD_RESET) {

            return redirect()
                ->route('admin.login')
                ->with(
                    'status',
                    'Mật khẩu đã được đổi thành công. Bạn có thể đăng nhập.'
                );
        }


        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => __($status),
            ]);
    }
}