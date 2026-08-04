@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="mb-3">
            <h2>Danh sách hóa đơn</h2>
        </div>
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Tạo ngày</th>
                </tr>
            </thead>
            <tbody id="orderTable">

            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/orders/orders.js') }}"></script>
@endpush