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

            @foreach($items as $item)

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

                    {{ number_format($item->product->price) }}

                </td>

                <td>

                    {{ $item->quantity }}

                </td>

                <td>

                    {{ number_format($item->product->price*$item->quantity) }}

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection