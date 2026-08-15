@extends('layouts.admin')

@section('page-title', 'Người dùng')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1">Người dùng</h4>

            <p class="text-muted mb-0">
                Quản lý tài khoản người dùng và phân quyền.
            </p>
        </div>

        <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#createUserModal">

            <i class="bi bi-person-plus"></i>

            Tạo tài khoản

        </button>

    </div>


    {{-- Search --}}
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-6">

                    <label class="form-label">
                        Tìm kiếm
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>

                        <input
                            type="text"
                            id="search-users"
                            class="form-control"
                            placeholder="Tìm theo tên hoặc email...">

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Users table --}}
    <div class="card shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th style="width: 60px;">
                                #
                            </th>

                            <th>
                                Người dùng
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Số điện thoại
                            </th>

                            <th>
                                Vai trò
                            </th>

                            <th>
                                Trạng thái
                            </th>

                            <th>
                                Đăng nhập gần nhất
                            </th>

                            <th style="width: 150px;">
                                Thao tác
                            </th>

                        </tr>

                    </thead>

                    <tbody id="users-table">

                        @forelse($users as $user)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                {{-- User --}}
                                <td>

                                    <div class="d-flex align-items-center gap-2">

                                        <div
                                            class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px;">

                                            {{ strtoupper(substr($user->name, 0, 1)) }}

                                        </div>

                                        <div>

                                            <div class="fw-semibold">
                                                {{ $user->name }}
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                {{-- Email --}}
                                <td>
                                    {{ $user->email }}
                                </td>


                                {{-- Phone --}}
                                <td>
                                    {{ $user->phone ?? '—' }}
                                </td>


                                {{-- Role --}}
                                <td>

                                    @forelse($user->roles as $role)

                                        <span class="badge bg-primary">
                                            {{ $role->name }}
                                        </span>

                                    @empty

                                        <span class="text-muted">
                                            Chưa có vai trò
                                        </span>

                                    @endforelse

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($user->status)

                                        <span class="badge bg-success">
                                            Hoạt động
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Không hoạt động
                                        </span>

                                    @endif

                                </td>


                                {{-- Last login --}}
                                <td>

                                    @if($user->last_login_at)

                                        {{ \Carbon\Carbon::parse($user->last_login_at)->format('H:i d/m/Y') }}

                                    @else

                                        <span class="text-muted">
                                            Chưa đăng nhập
                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td>

                                    <div class="d-flex gap-1">

                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-primary"
                                            title="Chỉnh sửa">

                                            <i class="bi bi-pencil"></i>

                                        </button>


                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger"
                                            title="Xóa">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-5 text-muted">

                                    <i
                                        class="bi bi-people fs-2 d-block mb-2">
                                    </i>

                                    Chưa có người dùng nào.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


    </div>

</div>


{{-- ========================================================= --}}
{{-- CREATE USER MODAL --}}
{{-- ========================================================= --}}

<div
    class="modal fade"
    id="createUserModal"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">


            {{-- Header --}}
            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-person-plus me-1"></i>

                    Tạo tài khoản

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>


            {{-- Form --}}
            <form
                action="{{ route('admin.users.store') }}"
                method="POST">

                @csrf


                <div class="modal-body">

                    {{-- Name --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Họ tên
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Nhập họ tên"
                            required>

                    </div>


                    {{-- Email --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="example@gmail.com"
                            required>

                    </div>


                    {{-- Role --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Vai trò
                        </label>

                        <select
                            name="role_id"
                            class="form-select"
                            required>

                            <option value="">
                                -- Chọn vai trò --
                            </option>

                            @foreach($roles as $role)

                                <option value="{{ $role->id }}">
                                    {{ $role->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Notice --}}
                    <div class="alert alert-info mb-0">

                        <i class="bi bi-info-circle me-1"></i>

                        Hệ thống sẽ tự động tạo một
                        <strong>mật khẩu tạm thời</strong>
                        và gửi thông tin đăng nhập đến email của người dùng.

                        <br>

                        Người dùng sẽ được yêu cầu đổi mật khẩu
                        sau lần đăng nhập đầu tiên.

                    </div>

                </div>


                {{-- Footer --}}
                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Hủy

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-send me-1"></i>

                        Tạo tài khoản

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection