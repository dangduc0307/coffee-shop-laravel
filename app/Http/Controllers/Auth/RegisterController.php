<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    /**
     * Hiển thị trang đăng ký.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Đăng ký.
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['nullable', 'max:20'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // Kiểm tra email bằng Emailable
        $response = Http::get('https://api.emailable.com/v1/verify', [
            'email' => $data['email'],
            'api_key' => env('EMAILABLE_API_KEY'),
        ]);

        if (!$response->successful()) {
            return back()->withErrors([
                'email' => 'Không thể xác minh email lúc này. Vui lòng thử lại sau.'
            ])->withInput();
        }

        $result = $response->json();

        if (($result['state'] ?? '') !== 'deliverable') {
            return back()->withErrors([
                'email' => 'Email này không tồn tại hoặc không thể nhận email.'
            ])->withInput();
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        // Auth::login($user);

        return redirect()->route('login');
    }


    public function checkEmail(Request $request)
    {
        $response = Http::get('https://api.emailable.com/v1/verify', [
            'email' => $request->email,
            'api_key' => env('EMAILABLE_API_KEY'),
        ]);

        $result = $response->json();

        if (($result['state'] ?? '') !== 'deliverable') {
            return response()->json([
                'valid' => false,
                'message' => 'Email này không tồn tại.'
            ]);
        }

        return response()->json([
            'valid' => true
        ]);
    }
}