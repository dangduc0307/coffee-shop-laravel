@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="mb-4">Thông tin cá nhân</h2>

    <div class="card">
        <div class="card-body">

            <p>
                <strong>Họ tên:</strong>
                {{ $user->name }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $user->email }}
            </p>

            <p>
                <strong>Số điện thoại:</strong>
                {{ $user->phone }}
            </p>

            <p>
                <strong>Vai trò:</strong>
                {{ ucfirst($user->role) }}
            </p>

             <hr>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Đăng xuất
                </button>
            </form>

        </div>
    </div>

</div>
@endsection