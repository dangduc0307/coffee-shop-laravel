@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>Quản lý thông báo</h2>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#addModal">

            Thêm thông báo

        </button>

    </div>

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th width="80">ID</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th width="180">Thao tác</th>
            </tr>
        </thead>
        <tbody id="notificationTable">

        </tbody>

    </table>

</div>

@include('admin.notifications.add-modal')

@include('admin.notifications.edit-modal')

@endsection


@push('scripts')

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="{{ asset('js/notifications/notifications.js') }}"></script>

@endpush