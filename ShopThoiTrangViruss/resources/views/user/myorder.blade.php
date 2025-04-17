@extends('user.dashboard_user')


<!-- Product section-->
@section('content')
<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<main class="cart-form">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="table-wrapper">
                <div class="table-title">
                    <h4 style="text-align: center;border-bottom: 1px solid gray;padding-bottom: 20px">Đơn Hàng Của Bạn
                    </h4>
                </div>
                    @foreach($order as $item)
                    @if(!empty($item))
                    <div class="card" id="product-item">
                        <div class="card-body">
                            <div class="product-item">
                                <div class="row">
                                    <div class="col-md-8 mx-5">
                                        <div class="product-info">
                                            <span class="d-flex">
                                                    Mã đơn hàng: {{ $item->id_order }}
                                            </span>
                                            <span>Giá: {{ $item->total_order }}VNĐ</span><br>
                                            <span>Địa chỉ nhận hàng: {{ $item->address }}</span>
                                            <br>
                                            <span>Ngày đặt: {{ $item->created_at }}</span>
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <div class="quantity">
                                            <a href="{{ route('detailsorder.detailsOrderIndex', ['id_order' => $item->id_order, 'id_user' => $item->id_user]) }}"
                                                class="btn btn-danger">Xem chi tiết</i></a>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
            </div>
        </div>
</main>

<style>
.cart-form{
    margin-top: 20px;
}

.product-info {
    margin-bottom: 20px;
    margin-top: 20px;
}

.quantity{
    margin-top: 50px;
}

.form-cart .product-item {
    width: 100%;
}

.form-cart .product-item img {
    margin-right: 25%;
    margin-left: 25%;
    width: 50%;
    height: 200px;
}

.product-info a {
    text-decoration: none;
}

.product-info a h3 {
    color: gray;
}

.product-info .price {
    font-weight: 600;
    color: red;
}

#total {
    background-color: #fff;
    border: 1px solid rgba(145, 158, 171, .239);
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    bottom: 0;
    box-shadow: 0 -4px 20px -1px rgba(40, 124, 234, .15);
    display: flex;
    justify-content: space-between;
    left: 50%;
    margin: auto;
    max-width: 1000px;
    padding: 10px 10px 15px;
    position: fixed;
    transform: translateX(-50%);
    width: 100%;
    z-index: 11;
}

.total-card {
    color: red;
    font-weight: 600;
}

#product-item {
    max-width: 100%;
    margin-top: 20px
}
</style>

<script>
const plus = document.querySelector(".plus"),
    minus = document.querySelector(".minus"),
    num = document.querySelector(".num");
let a = 1;
plus.addEventListener("click", () => {
    a++;
    a = (a < 10) ? "0" + a : a;
    num.innerText = a;
});
minus.addEventListener("click", () => {
    if (a > 1) {
        a--;
        a = (a < 10) ? "0" + a : a;
        num.innerText = a;
    }

});
</script>
@endsection