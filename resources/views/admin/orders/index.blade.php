@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="mb-3">
            <h2>Danh sách hóa đơn</h2>
        </div>
        <div class="row mb-3">

            <div class="col-md-4">

                <input
                    type="text"
                    id="search-orders"
                    class="form-control"
                    placeholder="Tìm theo tên, sđt, email...">

            </div>

        </div>
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
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