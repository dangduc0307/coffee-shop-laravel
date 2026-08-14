<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */

        $roles = [
            [
                'name' => 'super_admin',
                'display_name' => 'Quản trị viên',
                'description' => 'Toàn quyền hệ thống',
            ],

            [
                'name' => 'manager',
                'display_name' => 'Quản lý',
                'description' => 'Quản lý hoạt động quán',
            ],

            [
                'name' => 'cashier',
                'display_name' => 'Thu ngân',
                'description' => 'Quản lý đơn hàng và thanh toán',
            ],

            [
                'name' => 'barista',
                'display_name' => 'Pha chế',
                'description' => 'Xử lý đơn pha chế',
            ],

            [
                'name' => 'warehouse',
                'display_name' => 'Kho',
                'description' => 'Quản lý kho',
            ],

            [
                'name' => 'staff',
                'display_name' => 'Nhân viên',
                'description' => 'Nhân viên phục vụ',
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['name' => $role['name']],
                $role
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Permissions
        |--------------------------------------------------------------------------
        */

        $permissions = [

            // Products
            ['name' => 'products.view', 'display_name' => 'Xem sản phẩm'],
            ['name' => 'products.create', 'display_name' => 'Thêm sản phẩm'],
            ['name' => 'products.update', 'display_name' => 'Sửa sản phẩm'],
            ['name' => 'products.delete', 'display_name' => 'Xóa sản phẩm'],

            // Categories
            ['name' => 'categories.view', 'display_name' => 'Xem danh mục'],
            ['name' => 'categories.create', 'display_name' => 'Thêm danh mục'],
            ['name' => 'categories.update', 'display_name' => 'Sửa danh mục'],
            ['name' => 'categories.delete', 'display_name' => 'Xóa danh mục'],

            // Orders
            ['name' => 'orders.view', 'display_name' => 'Xem đơn hàng'],
            ['name' => 'orders.create', 'display_name' => 'Tạo đơn hàng'],
            ['name' => 'orders.update', 'display_name' => 'Sửa đơn hàng'],
            ['name' => 'orders.delete', 'display_name' => 'Xóa đơn hàng'],

            // Payments
            ['name' => 'payments.view', 'display_name' => 'Xem thanh toán'],
            ['name' => 'payments.create', 'display_name' => 'Tạo thanh toán'],
            ['name' => 'payments.refund', 'display_name' => 'Hoàn tiền'],

            // Inventory
            ['name' => 'inventory.view', 'display_name' => 'Xem kho'],
            ['name' => 'inventory.create', 'display_name' => 'Nhập kho'],
            ['name' => 'inventory.update', 'display_name' => 'Cập nhật kho'],
            ['name' => 'inventory.delete', 'display_name' => 'Xóa dữ liệu kho'],

            // Users
            ['name' => 'users.view', 'display_name' => 'Xem người dùng'],
            ['name' => 'users.create', 'display_name' => 'Thêm người dùng'],
            ['name' => 'users.update', 'display_name' => 'Sửa người dùng'],
            ['name' => 'users.delete', 'display_name' => 'Xóa người dùng'],

            // Reports
            ['name' => 'reports.view', 'display_name' => 'Xem báo cáo'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                $permission
            );
        }
    }
}