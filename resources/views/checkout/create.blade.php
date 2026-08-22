@extends('layouts.app')

@section('title', 'Thanh toán')

@section('content')

<div class="container py-5">

    <div class="row">

        {{-- Thông tin giao hàng --}}
        <div class="col-lg-7">

            <div class="card shadow-sm">

                <div class="card-header">

                    <h4 class="mb-0">
                        Thông tin thanh toán
                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('checkout.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Họ và tên
                            </label>

                            <input
                                type="text"
                                name="customer_name"
                                class="form-control @error('customer_name') is-invalid @enderror"
                                value="{{ old('customer_name', Auth::user()->name) }}"
                                required>

                            @error('customer_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Số điện thoại
                                    </label>

                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone', Auth::user()->phone) }}"
                                        required>

                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', Auth::user()->email) }}"
                                        required>

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        {{-- <div class="mb-3">

                            <label class="form-label">
                                Địa chỉ giao hàng
                            </label>

                            <textarea
                                name="address"
                                rows="4"
                                class="form-control @error('address') is-invalid @enderror"
                                required>{{ old('address') }}</textarea>

                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div> --}}

                        <div class="d-flex justify-content-end">

                            <button
                                type="submit"
                                class="btn btn-danger">

                                Tiếp tục thanh toán

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        {{-- Tóm tắt đơn hàng --}}
        <div class="col-lg-5">

            <div class="card shadow-sm">

                <div class="card-header">

                    <h5 class="mb-0">
                        Đơn hàng của bạn
                    </h5>

                </div>

                <div class="card-body">

                    @php
                        $total = 0;
                    @endphp

                    @foreach($cart->cartItems as $item)

                        @php
                            $subtotal = $item->product->price * $item->quantity;
                            $total += $subtotal;
                        @endphp

                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                {{ $item->product->name }}
                                × {{ $item->quantity }}
                            </span>

                            <span>
                                {{ number_format($subtotal,0,',','.') }} VNĐ
                            </span>

                        </div>

                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between fw-bold">

                        <span>Tổng cộng</span>

                        <span class="text-danger">
                            {{ number_format($total,0,',','.') }} VNĐ
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection