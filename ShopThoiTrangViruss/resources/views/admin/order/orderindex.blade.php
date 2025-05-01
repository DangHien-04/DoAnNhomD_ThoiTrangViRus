@extends('admin.dashboard')


<!-- Product section-->
@section('content')
<main class="category-form">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản Lý Hóa Đơn</h2>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-5 form-wrapper">
                    <form action="{{ route('admin.adminSearchOrder') }}">
                        <input type="text" name="id" class="input-search">
                        <input type="submit" value="Tìm kiếm" class="btn btn-warning">
                    </form>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Mã người dùng</th>
                            <th>Giá</th>
                            <th>Địa chỉ</th>
                            <th>Ngày thanh toán</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $orders)
                            <tr>
                                <td>{{ $orders->id_order }}</td>
                                <td>{{ $orders->id_user }}</td>
                                <td>{{ $orders->total_order }}</td>
                                <td>{{ $orders->address }}</td>
                                <td>{{ $orders->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.adminDetailsOrderIndex', ['id_order' => $orders->id_order]) }}"
                                        class="mx-1 btn btn-primary">Xem</a>
                                    <a href="{{ route('admin.adminDetailsOrderDelete', ['id_order' => $orders->id_order]) }}"
                                        class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">{{ $order->links() }}</div>
                    <div class="col-md-5"></div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
    .input-search {
        width: 30%;
        height: 40px;
        border-radius: 15px;
        padding-left: 15px;
    }

    .btn-warning {
        color: white;
        font-weight: bold;
    }

    .btn-warning:hover {
        color: white;
    }

    table th, table td{
        border: 1px solid black;
    }
</style>
@endsection