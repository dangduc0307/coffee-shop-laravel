@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center">

        <h1 class="text-success">
            ✔ Thanh toán thành công
        </h1>

        <p class="mt-3">
            Cảm ơn bạn đã mua hàng.
        </p>

        <p>
            Mã đơn hàng:
            <strong>#{{ $payment->order->id }}</strong>
        </p>

        <a
            href="{{ route('shop.index') }}"
            class="btn btn-danger">

            Tiếp tục mua hàng

        </a>

    </div>

</div>

@endsection