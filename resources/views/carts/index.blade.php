@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Giỏ hàng</h2>

    <table class="table">

        <thead>

            <tr>

                <th>Ảnh</th>

                <th>Sản phẩm</th>

                <th>Giá</th>

                <th>Số lượng</th>

                <th>Thành tiền</th>

            </tr>

        </thead>

        <tbody>

            @foreach($cartItems as $item)

            <tr>

                <td>

                    <img
                    src="{{ asset('uploaded-images/'.$item->product->thumbnail) }}"
                    width="80">

                </td>

                <td>

                    {{ $item->product->name }}

                </td>

                <td>

                    {{ number_format($item->product->price, 0, ',', '.') }} VNĐ

                </td>

                <td>
                    <div class="d-flex align-items-center gap-2">

                        <button
                            class="btn btn-outline-secondary btn-sm decrease-btn"
                            data-id="{{ $item->id }}">
                            -
                        </button>

                        <span
                            id="quantity-{{ $item->id }}"
                            data-stock="{{ $item->product->stock }}">
                            {{ $item->quantity }}
                        </span>

                        <button
                            class="btn btn-outline-secondary btn-sm increase-btn"
                            data-id="{{ $item->id }}">
                            +
                        </button>

                    </div>
                </td>

                <td
                    id="subtotal-{{ $item->id }}"
                    data-price="{{ $item->product->price }}">

                    {{ number_format($item->product->price * $item->quantity, 0, ',','.')}} VNĐ

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/carts/carts.js') }}"></script>
@endsection