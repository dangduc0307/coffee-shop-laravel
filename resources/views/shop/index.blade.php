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

    <div class="row" id="productList">
        {{-- Sản phẩm được render bằng AJAX --}}
    </div>

    <div id="pagination" class="mt-4"></div>

</div>

@endsection

@section('scripts')

    <script>
        const isLoggedIn = @json(Auth::check());
    </script>
    <script>

        const purchasedProductIds = @json($purchasedProductIds);

        const cartProductIds = @json($cartProductIds);

        const currentCategory = @json(request('category'));

        const shopDownloadRoute = @json(
            route('shop.download', ['product' => '__PRODUCT_ID__'])
        );
    </script>
    <script src="{{ asset('js/carts/carts.js') }}"></script>
    <script src="{{ asset('js/shop/shop.js') }}"></script>
@endsection