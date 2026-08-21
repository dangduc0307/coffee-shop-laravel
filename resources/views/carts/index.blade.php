@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4 text-title">Giỏ hàng</h2>

    <div id="cartContainer" @if($cartItems->isEmpty()) class="d-none" @endif>

        <table class="table">

            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>

                @foreach($cartItems as $item)

                <tr id="cart-row-{{ $item->id }}">

                    <td>
                        <img
                            src="{{ asset('uploaded-images/'.$item->product->thumbnail) }}"
                            width="80">
                    </td>

                    <td>{{ $item->product->name }}</td>

                    <td>
                        {{ number_format($item->product->price, 0, ',', '.') }} VNĐ
                    </td>

                    <td> 
                        <span id="quantity-{{ $item->id }}">
                            {{ $item->quantity }}
                        </span>
                    </td>

                    <td
                        id="subtotal-{{ $item->id }}"
                        data-price="{{ $item->product->price }}">

                        {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }} VNĐ

                    </td>

                    <td>
                        <button
                            class="btn btn-danger btn-sm"
                            onclick="deleteCart({{ $item->id }})">
                            Xóa
                        </button>
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <div class="card mt-4">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <h5>Tổng tiền</h5>

                    <h5
                        id="cart-total"
                        data-total="{{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}">

                        {{ number_format(
                            $cartItems->sum(fn($item) => $item->product->price * $item->quantity),
                            0,
                            ',',
                            '.'
                        ) }} VNĐ

                    </h5>

                </div>

                <hr>

                <a href="{{ route('checkout.create') }}"
                class="btn btn-danger px-4">
                    Thanh toán bằng SePay
                </a>

            </div>

        </div>

    </div>

    <div
        id="emptyCart"
        class="cart-empty @if(!$cartItems->isEmpty()) d-none @endif">

        <img
            src="{{ asset('images/empty-cart.png') }}"
            alt="Giỏ hàng trống"
            width="500"
            class="mb-3">

        <h5 class="text-muted">
            "Hổng" có gì trong giỏ hết trơn 🛒
        </h5>

        <a href="{{ route('shop.index') }}">
            Đặt hàng ngay
        </a>

    </div>

</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/carts/carts.js') }}"></script>
@endsection