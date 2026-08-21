@extends('layouts.admin')

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

    <div class="row mb-3">

        <div class="col-md-4">

            <input
                type="text"
                id="search-products"
                class="form-control"
                placeholder="Tìm theo tên hoặc mô tả...">

        </div>

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
                <th>File</th>
                <th>Demo</th>
                <th>Nổi bật</th>
                <th>Trạng thái</th>
                {{-- <th width="180">Thao tác</th> --}}
                @if(
                    auth()->user()->hasPermission('products.update') ||
                    auth()->user()->hasPermission('products.delete')
                )

                    <th width="180">Thao tác</th>

                @endif

            </tr>

        </thead>

        <tbody id="productTable">

        </tbody>

    </table>
    <div id="pagination" class="mt-3"></div>

</div>

{{-- Modal thêm --}}
@if(auth()->user()->hasPermission('products.create'))

    @include('admin.products.add-modal')

@endif


{{-- Modal sửa --}}
@if(auth()->user()->hasPermission('products.update'))

    @include('admin.products.edit-modal')

@endif

@endsection

@push('scripts')
<script>

    /*
    |--------------------------------------------------------------------------
    | Permissions
    |--------------------------------------------------------------------------
    */

    window.productPermissions = {

        create: @json(
            auth()->user()->hasPermission('products.create')
        ),

        update: @json(
            auth()->user()->hasPermission('products.update')
        ),

        delete: @json(
            auth()->user()->hasPermission('products.delete')
        ),

    };

</script>
<script src="{{ asset('js/products/products.js') }}"></script>
<script src="{{ asset('js/products/add-product-form.js') }}"></script>
<script src="{{ asset('js/products/edit-product-form.js') }}"></script>
@endpush