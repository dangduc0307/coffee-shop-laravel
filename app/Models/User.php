<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Các thuộc tính được phép gán hàng loạt.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
        'avatar',
        'provider',
        'provider_id',
        'status',
        'role',
        'last_login_at',
    ];

    /**
     * Các thuộc tính sẽ bị ẩn khi trả về JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Ép kiểu dữ liệu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Giỏ hàng của người dùng.
     */
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }


    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_user'
        );
    }


    public function hasRole(string $role): bool
    {
        return $this->roles()
            ->where('name', $role)
            ->exists();
    }

    public function hasPermission(string $permission): bool
    {
        return $this->roles()
            ->whereHas('permissions', function ($query) use ($permission) {
                $query->where('name', $permission);
            })
            ->exists();
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(
            new AdminResetPasswordNotification($token)
        );
    }
}