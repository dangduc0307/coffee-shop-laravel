<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.admin-login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => [
    //             'required',
    //             'email',
    //         ],

    //         'password' => [
    //             'required',
    //         ],
    //     ]);

    //     $remember = $request->boolean('remember');

    //     if (!Auth::attempt($credentials, $remember)) {

    //         return back()
    //             ->withErrors([
    //                 'email' => 'Email hoặc mật khẩu không chính xác.',
    //             ])
    //             ->withInput(
    //                 $request->only('email')
    //             );
    //     }

    //     $request->session()->regenerate();

    //     $user = Auth::user();

    //     // Kiểm tra Super Admin
    //     if (!$user->hasRole('super_admin')) {

    //         Auth::logout();

    //         $request->session()->invalidate();

    //         $request->session()->regenerateToken();

    //         return back()
    //             ->withErrors([
    //                 'email' => 'Tài khoản không có quyền quản trị.',
    //             ])
    //             ->withInput(
    //                 $request->only('email')
    //             );
    //     }

    //     return redirect()->route('admin.dashboard');
    // }



    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
            ],
        ]);

        $remember = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {

            return back()
                ->withErrors([
                    'email' => 'Email hoặc mật khẩu không chính xác.',
                ])
                ->withInput(
                    $request->only('email')
                );
        }

        $request->session()->regenerate();

        $user = Auth::user();

        return redirect()->route('admin.dashboard');
    }


    /**
     * Đăng xuất.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect()->route('admin.login');
        return redirect()
        ->route('admin.login')
        ->with(
            'status',
            'Mật khẩu đã được đổi thành công. Bạn có thể đăng nhập.'
        );
    }
}