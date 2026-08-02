@extends('layouts.app')

@section('title', 'Thanh toán')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0">

                <div class="card-header bg-danger text-white">

                    <h4 class="mb-0">
                        Thanh toán đơn hàng #{{ $payment->order->id }}
                    </h4>

                </div>

                <div class="card-body">

                    {{-- Trạng thái --}}
                    <div class="mb-3">

                        <strong>Trạng thái:</strong>

                        @if($payment->status == 'pending')

                            <span
                                id="payment-status"
                                class="badge bg-warning text-dark">

                                Chờ thanh toán

                            </span>

                        @else

                            <span
                                id="payment-status"
                                class="badge bg-success">

                                Đã thanh toán

                            </span>

                        @endif

                    </div>

                    {{-- Thời gian tạo --}}
                    <div class="mb-3">

                        <strong>Ngày tạo:</strong>

                        {{ $payment->created_at->format('d/m/Y H:i:s') }}

                    </div>

                    {{-- Tổng tiền --}}
                    <div class="mb-3">

                        <strong>Tổng tiền:</strong>

                        <span class="text-danger fw-bold fs-3">

                            {{ number_format($payment->amount,0,',','.') }}

                            VNĐ

                        </span>

                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-md-6">

                            <p>

                                <strong>Ngân hàng:</strong>

                                VPBank

                            </p>

                            <p>

                                <strong>Số tài khoản:</strong>

                                0372718388

                            </p>

                            <p>

                                <strong>Chủ tài khoản:</strong>

                                ĐẶNG ĐỨC

                            </p>

                        </div>

                        <div class="col-md-6">

                            <label class="fw-bold">

                                Nội dung chuyển khoản

                            </label>

                            <div class="input-group">

                                <input
                                    id="paymentCode"
                                    class="form-control"
                                    value="{{ $payment->payment_code }}"
                                    readonly>

                                <button
                                    class="btn btn-danger"
                                    type="button"
                                    onclick="copyPaymentCode()">

                                    Copy

                                </button>

                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="text-center">

                        <img
                            src="https://img.vietqr.io/image/VPB-0372718388-compact2.png?amount={{ $payment->amount }}&addInfo={{ urlencode($payment->payment_code) }}&accountName={{ urlencode('DANG DUC') }}"
                            class="img-fluid rounded"
                            width="320">

                    </div>

                    <div class="alert alert-info text-center mt-4 mb-0">

                        <h5>

                            Vui lòng quét mã QR để thanh toán.

                        </h5>

                        <p class="mb-1">

                            Sau khi chuyển khoản thành công,

                            hệ thống sẽ tự động xác nhận.

                        </p>

                        <small class="text-muted">

                            Không đóng trang này trong lúc thanh toán.

                        </small>

                    </div>

                   <div class="d-flex justify-content-center mt-4">

                        <a
                            href="{{ route('shop.index') }}"
                            class="btn btn-outline-secondary">

                            Tiếp tục mua hàng

                        </a>

                    </div>

                    <div
                        id="paymentSuccess"
                        class="alert alert-success mt-4 d-none">

                        <h5 class="mb-1">
                            ✅ Thanh toán thành công
                        </h5>

                        <p class="mb-0">
                            Hệ thống đang chuyển bạn tới trang hoàn tất đơn hàng...
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@section('scripts')

<script>

function copyPaymentCode() {

    navigator.clipboard.writeText(
        document.getElementById('paymentCode').value
    );

    alert('Đã sao chép nội dung chuyển khoản.');

}

async function checkPaymentStatus() {

    const response = await fetch(
        "{{ route('payments.status',$payment->id) }}"
    );

    const data = await response.json();

    if(data.status === 'paid'){

        window.location.href =
            "{{ route('checkout.success',$payment->id) }}";

    }

}

setInterval(checkPaymentStatus,3000);

</script>

@endsection