<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        // ==============================
        // THỐNG KÊ TỔNG QUAN
        // ==============================

        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $totalUsers = User::count();

        $totalOrders = Order::count();

        // Chỉ tính doanh thu từ payment đã thanh toán
        $totalRevenue = Payment::where('status', 'paid')
            ->sum('amount');

        // ==============================
        // THỐNG KÊ THANH TOÁN
        // ==============================

        $paidPayments = Payment::where('status', 'paid')
            ->count();

        $pendingPayments = Payment::where('status', 'pending')
            ->count();

        

        // ==============================
        // ĐƠN HÀNG GẦN ĐÂY
        // ==============================

        $recentOrders = Order::latest()
            ->take(5)
            ->get();

        // ==============================
        // THANH TOÁN GẦN ĐÂY
        // ==============================

        $recentPayments = Payment::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalUsers',
            'totalOrders',
            'totalRevenue',
            'paidPayments',
            'pendingPayments',
            'recentOrders',
            'recentPayments'
        ));
    }
}