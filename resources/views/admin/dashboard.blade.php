@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')

<div class="container-fluid">

    {{-- ========================= --}}
    {{-- KPI CARDS --}}
    {{-- ========================= --}}

    <div class="row g-4 mb-4">

        {{-- Tổng sản phẩm --}}
        <div class="col-xl col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-muted mb-1">
                                Tổng sản phẩm
                            </p>

                            <h3 class="mb-0 fw-bold">
                                {{ number_format($totalProducts) }}
                            </h3>
                        </div>

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-box-seam text-primary fs-4"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{-- Tổng danh mục --}}
        <div class="col-xl col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-muted mb-1">
                                Tổng danh mục
                            </p>

                            <h3 class="mb-0 fw-bold">
                                {{ number_format($totalCategories) }}
                            </h3>
                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-tags text-success fs-4"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{-- Tổng người dùng --}}
        <div class="col-xl col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-muted mb-1">
                                Người dùng
                            </p>

                            <h3 class="mb-0 fw-bold">
                                {{ number_format($totalUsers) }}
                            </h3>
                        </div>

                        <div class="bg-info bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-people text-info fs-4"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{-- Tổng đơn hàng --}}
        <div class="col-xl col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-muted mb-1">
                                Đơn hàng
                            </p>

                            <h3 class="mb-0 fw-bold">
                                {{ number_format($totalOrders) }}
                            </h3>
                        </div>

                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-cart-check text-warning fs-4"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{-- Doanh thu --}}
        <div class="col-xl col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-muted mb-1">
                                Doanh thu
                            </p>

                            <h3 class="mb-0 fw-bold">
                                {{ number_format($totalRevenue, 0, ',', '.') }}
                                <small class="fs-6">đ</small>
                            </h3>
                        </div>

                        <div class="bg-danger bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-cash-stack text-danger fs-4"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>


    {{-- ========================= --}}
    {{-- PAYMENT STATISTICS --}}
    {{-- ========================= --}}

    <div class="row g-4 mb-4">

        {{-- Paid --}}
        <div class="col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Thanh toán thành công
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ number_format($paidPayments) }}
                            </h3>

                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">

                            <i class="bi bi-check-circle text-success fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Pending --}}
        <div class="col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Thanh toán đang chờ
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ number_format($pendingPayments) }}
                            </h3>

                        </div>

                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">

                            <i class="bi bi-clock text-warning fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================= --}}
    {{-- LOW STOCK + RECENT ORDERS --}}
    {{-- ========================= --}}

    <div class="row g-4 mb-4">

        


        {{-- Đơn hàng gần đây --}}
        <div class="col-lg-7">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white border-0 pt-4 px-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <h5 class="mb-0 fw-bold">
                            Đơn hàng gần đây
                        </h5>

                        <i class="bi bi-cart text-primary"></i>

                    </div>

                </div>


                <div class="card-body px-4">

                    <div class="table-responsive">

                        <table class="table align-middle mb-0">

                            <thead>

                                <tr>

                                    <th>
                                        Mã
                                    </th>

                                    <th>
                                        Khách hàng
                                    </th>

                                    <th>
                                        Tổng tiền
                                    </th>

                                    <th>
                                        Thanh toán
                                    </th>

                                    <th>
                                        Ngày
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($recentOrders as $order)

                                    <tr>

                                        <td>
                                            <strong>
                                                #{{ $order->id }}
                                            </strong>
                                        </td>


                                        <td>
                                            {{ $order->customer_name }}
                                        </td>


                                        <td>

                                            <strong>
                                                {{ number_format($order->total_price, 0, ',', '.') }}đ
                                            </strong>

                                        </td>


                                        <td>

                                            <span class="badge bg-light text-dark">
                                                {{ $order->payment_method }}
                                            </span>

                                        </td>


                                        <td>

                                            <small class="text-muted">

                                                {{ $order->created_at->format('d/m/Y H:i') }}

                                            </small>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5"
                                            class="text-center text-muted py-4">

                                            Chưa có đơn hàng.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================= --}}
    {{-- RECENT PAYMENTS --}}
    {{-- ========================= --}}

    <div class="row">

        <div class="col-12">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white border-0 pt-4 px-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <h5 class="mb-0 fw-bold">
                            Thanh toán gần đây
                        </h5>

                        <i class="bi bi-credit-card text-success"></i>

                    </div>

                </div>


                <div class="card-body px-4">

                    <div class="table-responsive">

                        <table class="table align-middle">

                            <thead>

                                <tr>

                                    <th>
                                        Mã thanh toán
                                    </th>

                                    <th>
                                        Mã đơn hàng
                                    </th>

                                    <th>
                                        Phương thức
                                    </th>

                                    <th>
                                        Số tiền
                                    </th>

                                    <th>
                                        Trạng thái
                                    </th>

                                    <th>
                                        Thời gian
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($recentPayments as $payment)

                                    <tr>

                                        <td>

                                            <strong>
                                                {{ $payment->payment_code }}
                                            </strong>

                                        </td>


                                        <td>

                                            #{{ $payment->order_id }}

                                        </td>


                                        <td>

                                            {{ $payment->payment_method }}

                                        </td>


                                        <td>

                                            <strong>
                                                {{ number_format($payment->amount, 0, ',', '.') }}đ
                                            </strong>

                                        </td>


                                        <td>

                                            @if($payment->status === 'paid')

                                                <span class="badge bg-success">
                                                    Đã thanh toán
                                                </span>

                                            @elseif($payment->status === 'pending')

                                                <span class="badge bg-warning text-dark">
                                                    Đang chờ
                                                </span>

                                            @else

                                                <span class="badge bg-secondary">
                                                    {{ $payment->status }}
                                                </span>

                                            @endif

                                        </td>


                                        <td>

                                            <small class="text-muted">

                                                {{ $payment->created_at->format('d/m/Y H:i') }}

                                            </small>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="text-center text-muted py-4">

                                            Chưa có thanh toán.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection