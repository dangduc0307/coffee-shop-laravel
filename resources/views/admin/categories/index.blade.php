@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>Quản lý loại sản phẩm</h2>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#addModal">

            Thêm loại sản phẩm

        </button>

    </div>

    <table class="table table-bordered align-middle">

        <thead>

            <tr>

                <th width="80">ID</th>
                <th>Ảnh</th>
                <th>Tên loại sản phẩm</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th width="180">Thao tác</th>

            </tr>

        </thead>

        <tbody id="categoryTable">

        </tbody>

    </table>

</div>

@include('admin.categories.add-modal')

@include('admin.categories.edit-modal')

@endsection

@push('scripts')

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="{{ asset('js/categories/categories.js') }}"></script>

@endpush