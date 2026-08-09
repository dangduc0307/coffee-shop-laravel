@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="d-flex align-items-center mb-3">
            <h2>Danh sách thanh toán</h2>
        </div>

        <div class="row mb-3">

            <div class="col-md-4">

                <input
                    type="text"
                    id="search-payments"
                    class="form-control"
                    placeholder="Tìm theo mã thanh toán...">

            </div>

        </div>
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã thanh toán</th>
                    <th>Tên khách hàng</th>
                    <th>Phương thức</th>
                    <th>Cổng</th>
                    <th>Số tiền</th>
                    <th>Trạng thái</th>
                    <th>Thanh toán lúc</th>
                </tr>
            </thead>
            <tbody id="paymentTable">

            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/payments/payments.js') }}"></script>
@endpush