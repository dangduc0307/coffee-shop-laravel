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


                    {{-- Demo --}}
                    @if($product->demo_url)

                        <p>
                            <a
                                href="{{ $product->demo_url }}"
                                target="_blank"
                                class="btn btn-outline-primary btn-sm">

                                Xem Demo

                            </a>
                        </p>

                    @endif


                    {{-- Thông tin file --}}
                    <p class="text-muted mb-2">

                        File:
                        {{ $product->file_size ?? 'Đang cập nhật' }}

                    </p>


                    {{-- =============================== --}}
                    {{-- KIỂM TRA ĐÃ MUA --}}
                    {{-- =============================== --}}

                    @if($purchasedProductIds->contains($product->id))

                        {{-- Đã mua --}}
                        <div class="text-success fw-bold mb-2">

                            <i class="bi bi-check-circle-fill"></i>

                            Đã mua

                        </div>


                        {{-- Nút tải xuống --}}
                        <a
                            href="{{ route('shop.download', $product->id) }}"
                            class="btn btn-success w-100">

                            <i class="bi bi-download"></i>

                            Tải xuống

                        </a>


                    @else

                        {{-- Chưa mua --}}
                        <button
                            class="btn btn-primary w-100 add-cart"
                            data-id="{{ $product->id }}">

                            Thêm vào giỏ

                        </button>

                    @endif

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