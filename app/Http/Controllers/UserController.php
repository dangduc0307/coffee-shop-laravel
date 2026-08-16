<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendUserAccountMail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::with('roles')
            ->latest()
            ->get();
        if ($request->expectsJson()) {
            return response()->json($notifications);
        }

        $roles = Role::all();

        return view('admin.users.index', compact(
            'users',
            'roles'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'role_id' => [
                'required',
                'exists:roles,id',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Tạo mật khẩu random
        |--------------------------------------------------------------------------
        */

        $temporaryPassword = Str::password(
            length: 12,
            letters: true,
            numbers: true,
            symbols: true,
            spaces: false
        );

        /*
        |--------------------------------------------------------------------------
        | Tạo user
        |--------------------------------------------------------------------------
        */

        $user = DB::transaction(function () use (
            $validated,
            $temporaryPassword
        ) {

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $temporaryPassword,
                'status' => 1,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Gán role
            |--------------------------------------------------------------------------
            */

            $user->roles()->sync([
                $validated['role_id']
            ]);

            return $user;
        });

        /*
        |--------------------------------------------------------------------------
        | Gửi email bằng Queue
        |--------------------------------------------------------------------------
        */

        SendUserAccountMail::dispatch(
            $user->name,
            $user->email,
            $temporaryPassword
        );

        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'Tạo tài khoản cấp dưới thành công. Thông tin đăng nhập đã được đưa vào hàng đợi gửi email.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
