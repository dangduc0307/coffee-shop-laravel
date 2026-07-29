@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="mb-4 text-center">
        Sản phẩm
    </h2>

    <div class="mb-4">

        <a href="{{ route('shop.index') }}"
           class="btn btn-dark me-2">
            Tất cả
        </a>

        @foreach($categories as $category)

            <a href="{{ route('shop.index',['category'=>$category->id]) }}"
               class="btn btn-outline-dark me-2">

                {{ $category->name }}

            </a>

        @endforeach

    </div>

    <div class="row">

        @foreach($products as $product)

        <div class="col-md-3 mb-4">

            <div class="card h-100">

                <img
                    src="{{ asset('uploaded-images/'.$product->thumbnail) }}"
                    class="card-img-top"
                    style="height:220px;object-fit:cover;"
                >

                <div class="card-body">

                    <h5>

                        {{ $product->name }}

                    </h5>

                    <p>

                        {{ number_format($product->price) }} đ

                    </p>

                    <p>

                        @if($product->stock>0)

                            <span class="badge bg-success">
                                Còn hàng
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Hết hàng
                            </span>

                        @endif

                    </p>

                    <button
                        class="btn btn-primary w-100 add-cart"
                        data-id="{{ $product->id }}">

                        Thêm vào giỏ

                    </button>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection

@section('scripts')
    
@endsection