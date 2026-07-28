<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Hiển thị trang đăng nhập.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Đăng nhập.
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors([
                    'email' => 'Email hoặc mật khẩu không đúng.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        Auth::user()->update([
            'last_login_at' => now(),
        ]);

        return redirect()->intended('/');
    }

    /**
     * Đăng xuất.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}