@extends('layouts.app')

@section('content')
{{--  Breadcrumb --}}
<nav aria-label="breadcrumb" class="mb-3 text-white">
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/" class="text-decoration-none text-white">
        Trang chủ
        </a>
    </li>

    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
    </ol>
</nav>
<div class="container py-5">

    
    {{-- Tiêu đề sản phẩm --}}
    <h2 class="mb-4 text-title">
        Sản phẩm
    </h2>

    <div class="mb-4">

        <a href="{{ route('shop.index') }}"
           class="btn-category me-2 {{ request('category') ? '' : 'active' }}">
            Tất cả
        </a>

        @foreach($categories as $category)

            <a href="{{ route('shop.index',['category'=>$category->id]) }}"
               class="btn-category me-2 {{ request('category') == $category->id ? 'active' : '' }}">

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

                        {{ number_format($product->price, 0, ',', '.') }} đ

                    </p>

                    <p>
                        @if($product->demo_url)
                            <a
                                href="{{ $product->demo_url }}"
                                target="_blank"
                                class="btn btn-outline-primary btn-sm">
                                Xem Demo
                            </a>
                        @endif
                    </p>

                    <p class="text-muted mb-2">
                        File:
                        {{ $product->file_size ?? 'Đang cập nhật' }}
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
    <script src="{{ asset('js/carts/carts.js') }}"></script>
@endsection