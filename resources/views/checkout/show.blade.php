@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow">

                <div class="card-header bg-danger text-white">

                    <h4 class="mb-0">
                        Thanh toán đơn hàng #{{ $payment->order->id }}
                    </h4>

                </div>

                <div class="card-body">

                    <div class="mb-3">

                        <strong>Tổng tiền:</strong>

                        <span class="text-danger fs-4">

                            {{ number_format($payment->amount,0,',','.') }}

                            VNĐ

                        </span>

                    </div>

                    <div class="mb-3">

                        <strong>Ngân hàng:</strong>

                        VPBank

                    </div>

                    <div class="mb-3">

                        <strong>Số tài khoản:</strong>

                        0372718388

                    </div>

                    <div class="mb-3">

                        <strong>Chủ tài khoản:</strong>

                        ĐẶNG ĐỨC

                    </div>

                    <div class="mb-3">

                        <strong>Nội dung chuyển khoản:</strong>

                        <div class="alert alert-warning">

                            <strong>

                                {{ $payment->payment_code }}

                            </strong>

                        </div>

                    </div>

                    <div class="text-center">

                        <img
                            src="https://img.vietqr.io/image/VPB-0372718388-compact2.png?amount={{ $payment->amount }}&addInfo={{ urlencode($payment->payment_code) }}&accountName={{ urlencode('DANG DUC') }}"
                            class="img-fluid"
                            width="320">

                    </div>

                    <hr>

                    <div class="alert alert-info text-center">

                        <strong>

                            Vui lòng quét mã QR để thanh toán.

                        </strong>

                        <br>

                        Hệ thống sẽ tự động xác nhận khi nhận được tiền.

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection