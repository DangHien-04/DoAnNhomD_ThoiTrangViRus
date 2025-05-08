@extends('user.dashboard_user')


@section('content')
<main>
<form action="{{ route('cart.addCard') }}" method="post" class="form-detailproduct">
    @csrf
    <div class="container">
        <div class="row">

            <!-- Product Image -->
            <div class="col-md-6">
                <div class="product-image-container">
                    <img src="{{ asset('uploads/productimage/' . $product->image_address_product) }}" alt="" class="product-image">
                </div>
            </div>
            <!-- /Product Image -->

            <!-- Product Details -->
            <div class="col-md-6 product-details">
                <input type="hidden" name="id_product" value="{{ $product->id_product }}">
                <h1 class="product-title">{{ $product->name_product }}</h1>
                <h4 class="product-price">{{ number_format($product->price_product, 0, ',', '.') }} VND</h4>
                <p class="product-stock">Kho: {{ $product->quantity_product }}</p>
                
                <!-- Size Selection -->
                <div class="size-selection">
                    <h4>Chọn kích thước</h4>
                    <select name="size" class="form-control" required>
                        <option value="" disabled selected>Chọn kích thước</option>
                        @foreach($sizes as $size)
                            <option value="{{ $size }}">{{ $size }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- /Size Selection -->

                <!-- Color Selection -->
                <div class="color-selection">
                    <h4>Chọn màu sắc</h4>
                    <select name="color" class="form-control" required>
                        <option value="" disabled selected>Chọn màu sắc</option>
                        @foreach($colors as $color)
                            <option value="{{ $color }}">{{ $color }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- /Color Selection -->

                <!-- Quantity Selection -->
                <div class="quantity-selection">
                    <h4>Số lượng</h4>
                    <div class="quantity-wrapper">
                        <button type="button" class="quantity-btn minus">-</button>
                        <input type="text" class="quantity-input" name="quantity_cart" id="quantity_cart" value="1">
                        <button type="button" class="quantity-btn plus">+</button>
                    </div>
                </div>
                <!-- /Quantity Selection -->

                <!-- Add to Cart Button -->
                <button type="submit" class="btn btn-primary btn-addCart">Thêm vào giỏ hàng</button>
            </div>
            <!-- /Product Details -->
        </div>

        <!-- Product Description -->
        <div class="row product-description">
            <div class="col-md-6">
                <h2>Mô tả sản phẩm</h2>
                <p>{{ $product->describe_product }}</p>
            </div>
            <div class="col-md-6">
                <h2>Thông số kỹ thuật</h2>
                <ul class="specifications-list">
                    <li><strong>Xuất xứ:</strong> {{ $specifications[0] }}</li>
                    <li><strong>Độ dài:</strong> {{ $specifications[1] }}</li>
                    <li><strong>Màu sắc:</strong> {{ $specifications[2] }}</li>
                    <li><strong>Kích thước:</strong> {{ $specifications[3] }}</li>
                    <li><strong>Phong cách:</strong> {{ $specifications[4] }}</li>
                    <li><strong>Chất liệu:</strong> {{ $specifications[5] }}</li>
                    <li><strong>Ngày sản xuất:</strong> {{ $specifications[6] }}</li>
                </ul>
            </div>
        </div>
        <!-- /Product Description -->
    </div>
</form>
</main>

<style>
/* General Styles */
.container {
    margin-top: 50px;
}

.product-image-container {
    text-align: center;
    margin-bottom: 20px;
}

.product-image {
    width: 100%;
    max-width: 400px;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.product-details {
    padding: 20px;
}

.product-title {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 10px;
}

.product-price {
    font-size: 24px;
    color: #ff523b;
    font-weight: bold;
    margin-bottom: 10px;
}

.product-stock {
    font-size: 16px;
    color: gray;
    margin-bottom: 20px;
}

.size-selection, .color-selection, .quantity-selection {
    margin-bottom: 20px;
}

.size-selection h4, .color-selection h4, .quantity-selection h4 {
    font-size: 16px;
    margin-bottom: 10px;
}

.form-control {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.quantity-wrapper {
    display: flex;
    align-items: center;
}

.quantity-btn {
    background-color: #ff523b;
    color: white;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    margin: 0 5px;
    transition: background-color 0.3s ease;
}

.quantity-btn:hover {
    background-color: #333;
}

.quantity-input {
    width: 60px;
    text-align: center;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 5px;
}

.btn-addCart {
    background-color: #ff523b;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-addCart:hover {
    background-color: #333;
}

/* Product Description */
.product-description {
    margin-top: 50px;
}

.product-description h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.specifications-list {
    list-style: none;
    padding: 0;
}

.specifications-list li {
    font-size: 16px;
    margin-bottom: 10px;
}

.specifications-list li strong {
    font-weight: bold;
}
</style>

<script>
const plus = document.querySelector(".plus"),
    minus = document.querySelector(".minus"),
    num = document.querySelector(".quantity-input");
let quantity = 1;

plus.addEventListener("click", () => {
    quantity++;
    num.value = quantity;
});

minus.addEventListener("click", () => {
    if (quantity > 1) {
        quantity--;
        num.value = quantity;
    }

});
</script>
@endsection