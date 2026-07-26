@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>Quản lý sản phẩm</h2>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#addModal">

            Thêm sản phẩm

        </button>

    </div>

    <table class="table table-bordered align-middle">

        <thead>

            <tr>

                <th width="80">ID</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Tồn kho</th>
                <th>Nổi bật</th>
                <th>Trạng thái</th>
                <th width="180">Thao tác</th>

            </tr>

        </thead>

        <tbody id="productTable">

        </tbody>

    </table>

</div>

@include('products.add-modal')

@include('products.edit-modal')

@endsection

@section('scripts')

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="{{ asset('js/products/products.js') }}"></script>
<script src="{{ asset('js/products/add-product-form.js') }}"></script>
<script src="{{ asset('js/products/edit-product-form.js') }}"></script>

@endsection