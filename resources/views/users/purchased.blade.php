@extends('layouts.app')

@section('content')

{{-- Breadcrumb --}}
<nav aria-label="breadcrumb" class="mb-3 text-white">

    <ol class="breadcrumb">

        <li class="breadcrumb-item">

            <a
                href="/"
                class="text-decoration-none text-white"
            >
                Trang chủ
            </a>

        </li>

        <li class="breadcrumb-item">

            <a
                href="{{ route('users.show', Auth::id()) }}"
                class="text-decoration-none text-white"
            >
                Thông tin cá nhân
            </a>

        </li>

        <li
            class="breadcrumb-item active"
            aria-current="page"
        >
            Sản phẩm đã mua
        </li>

    </ol>

</nav>


<div class="container py-5">


    {{-- Tiêu đề --}}
    <h2 class="mb-4 text-title">

        Các sản phẩm bạn đã mua

    </h2>


    {{-- Không có sản phẩm --}}
    @if($products->isEmpty())

        <div class="card">

            <div class="card-body text-center py-5">

                <i
                    class="bi bi-bag-x"
                    style="font-size: 50px;"
                ></i>

                <h5 class="mt-3">

                    Bạn chưa mua sản phẩm nào.

                </h5>

                <a
                    href="{{ route('shop.index') }}"
                    class="btn btn-primary mt-3"
                >
                    <i class="bi bi-shop me-2"></i>

                    Xem sản phẩm

                </a>

            </div>

        </div>

    @else


        {{-- Danh sách sản phẩm --}}
        <div class="row">

            @foreach($products as $product)

                <div class="col-md-3 mb-4">

                    <div class="card h-100">


                        {{-- Thumbnail --}}
                        <img
                            src="{{ asset('uploaded-images/'.$product->thumbnail) }}"
                            class="card-img-top"
                            style="height:220px;object-fit:cover;"
                        >


                        <div class="card-body">


                            {{-- Tên --}}
                            <h5>

                                {{ $product->name }}

                            </h5>


                            {{-- Giá --}}
                            <p>

                                {{ number_format($product->price, 0, ',', '.') }} đ

                            </p>

                            {{-- Ngày mua --}}
                            <p class="text-muted mb-2">

                                <i class="bi bi-calendar-check me-1"></i>

                                Ngày mua:
                                {{ $product->purchased_at->format('d/m/Y H:i') }}

                            </p>


                            {{-- Demo --}}
                            @if($product->demo_url)

                                <p>

                                    <a
                                        href="{{ $product->demo_url }}"
                                        target="_blank"
                                        class="btn btn-outline-primary btn-sm"
                                    >

                                        Xem Demo

                                    </a>

                                </p>

                            @endif


                            {{-- Thông tin file --}}
                            <p class="text-muted mb-2">

                                File:
                                {{ $product->file_size ?? 'Đang cập nhật' }}

                            </p>


                            {{-- Đã mua --}}
                            <div class="text-success fw-bold mb-2">

                                <i class="bi bi-check-circle-fill"></i>

                                Đã mua

                            </div>


                            {{-- Tải xuống --}}
                            <a
                                href="{{ route('shop.download', $product->id) }}"
                                class="btn btn-success w-100"
                                data-no-transition
                            >

                                <i class="bi bi-download"></i>

                                Tải xuống

                            </a>


                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif


</div>

@endsection