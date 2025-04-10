@extends('user.dashboard_user')


<!-- Product section-->
@section('content')
<main>
    <form method="post" class="form-detailproduct">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-6"><img src="{{ asset('uploads/productimage/' . $product->image_address_product) }}"
                    alt="" style="width: 80%; height: 500px;"></div>
            <div class="col-md-6" style="margin-top:150px;">
            <input type="hidden" name="id_product" value="{{ $product->id_product }}">
                <h1>{{ $product->name_product }}</h1>
                <h4 style="color:red;font-weight:600;">{{ $product->price_product }} VND</h4>
                <p style="color:gray;font-weight:600;">Kho: {{ $product->quantity_product }} </p>
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="color: gray;margin-top:20px;">Quantity </h4>
                        <div class="wrapper">
                            <span class="minus">-</span>
                            <input type="text" class="num" name="quantity_cart" id="quantity_cart" value="1">
                            <span class="plus">+</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-warning btn-addCart">Thêm vào giỏ hàng</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h1>Mô tả sản phẩm</h1>
                {{ $product->describe_product}}
            </div>
            <div class="col-md-6">
                <h4>Mô tả chi tiết {{ $product->name_product  }}</h4>
                <div class="row">
                    <div class="col-md-6" style="background: #f5f5f5;"> Xuất xứ:</div>
                    <div class="col-md-6" style="background: #f5f5f5;">{{ $specifications[0] }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6">Độ dài:</div>
                    <div class="col-md-6">{{ $specifications[1] }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="background: #f5f5f5;">Màu sắc:</div>
                    <div class="col-md-6" style="background: #f5f5f5;">{{ $specifications[2] }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6">Kích thước:</div>
                    <div class="col-md-6">{{ $specifications[3] }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="background: #f5f5f5;">Phong cách:</div>
                    <div class="col-md-6" style="background: #f5f5f5;">{{ $specifications[4] }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6"> Chất liệu:</div>
                    <div class="col-md-6">{{ $specifications[5] }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="background: #f5f5f5;">Ngày sản xuất:</div>
                    <div class="col-md-6" style="background: #f5f5f5;">{{ $specifications[6] }}</div>
                </div>
            </div>
            
        </div>

    </div>
    </form>
</main>
<style>
.wrapper {
    height: 40px;
    min-width: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #FFF;
    border-radius: 12px;
    box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
    border-radius: 12px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    margin-top: 20px;
}

.wrapper span {
    width: 100%;
    text-align: center;
    font-size: 20px;
    font-weight: 600;
    cursor: pointer;
}

.wrapper input[type='text']{
    width: 100%;
    font-size: 20px;
    border-right: 2px solid rgba(0, 0, 0, 0.2) !important;
    border-left: 2px solid rgba(0, 0, 0, 0.2) !important;
    pointer-events: none;
    border: none;
    text-align: center;
}

.btn-addCart{
    color: #FFF;
    font-weight: 600;
    font-size: 20px;
    margin-top: 40px;
}

.btn-addCart:hover{
    color: #FFF;
}

.form-detailproduct{
    margin-top: 60px;
    margin-bottom: 60px;
}
</style>
<script>
const plus = document.querySelector(".plus"),
    minus = document.querySelector(".minus"),
    num = document.querySelector(".num");
let a = 1;
plus.addEventListener("click", () => {
    a++;
    num.value = a;
});
minus.addEventListener("click", () => {
    if (a > 1) {
        a--;
        num.value = a;
    }

});
</script>
@endsection