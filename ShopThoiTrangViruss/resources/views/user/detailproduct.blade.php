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
                    <img src="{{ asset('uploads/productimage/' . $product->image_address_product) }}" alt="{{ $product->name_product }}" class="product-image">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6 product-details">
                <input type="hidden" name="id_product" value="{{ $product->id_product }}">
                <div class="product-header">
                    <h1 class="product-title">{{ $product->name_product }}</h1>
                    <div class="manufacturer-badge">
                        <i class="fas fa-industry"></i>
                        {{ $manufacturer->name_manufacturer }}
                    </div>
                </div>
                <h4 class="product-price">{{ number_format($product->price_product, 0, ',', '.') }} VND</h4>
                <p class="product-stock"><i class="fas fa-box"></i> Kho: {{ $product->quantity_product }}</p>
                
                <!-- Size Selection -->
                <div class="size-selection">
                    <h4><i class="fas fa-ruler"></i> Chọn kích thước</h4>
                    <select name="size" class="form-control" required>
                        <option value="" disabled selected>Chọn kích thước</option>
                        @foreach($sizes as $size)
                            <option value="{{ $size }}">{{ $size }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Color Selection -->
                <div class="color-selection">
                    <h4><i class="fas fa-palette"></i> Chọn màu sắc</h4>
                    <select name="color" class="form-control" required>
                        <option value="" disabled selected>Chọn màu sắc</option>
                        @foreach($colors as $color)
                            <option value="{{ $color }}">{{ $color }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity Selection -->
                <div class="quantity-selection">
                    <h4><i class="fas fa-sort-numeric-up"></i> Số lượng</h4>
                    <div class="quantity-wrapper">
                        <button type="button" class="quantity-btn minus">-</button>
                        <input type="text" class="quantity-input" name="quantity_cart" id="quantity_cart" value="1" readonly>
                        <button type="button" class="quantity-btn plus">+</button>
                    </div>
                </div>

                <!-- Add to Cart Button -->
                <button type="submit" class="btn btn-addCart">
                    <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                </button>
            </div>
        </div>

        <!-- Product Description -->
        <div class="row product-description">
            <div class="col-md-6">
                <h2><i class="fas fa-info-circle"></i> Mô tả sản phẩm</h2>
                <p>{{ $product->describe_product }}</p>
            </div>
            <div class="col-md-6">
                <h2><i class="fas fa-list"></i> Thông số kỹ thuật</h2>
                <ul class="specifications-list">
                    <li><i class="fas fa-globe"></i> <strong>Xuất xứ:</strong> {{ $specifications[0] }}</li>
                    <li><i class="fas fa-ruler-vertical"></i> <strong>Độ dài:</strong> {{ $specifications[1] }}</li>
                    <li><i class="fas fa-palette"></i> <strong>Màu sắc:</strong> {{ $specifications[2] }}</li>
                    <li><i class="fas fa-expand"></i> <strong>Kích thước:</strong> {{ $specifications[3] }}</li>
                    <li><i class="fas fa-tshirt"></i> <strong>Phong cách:</strong> {{ $specifications[4] }}</li>
                    <li><i class="fas fa-layer-group"></i> <strong>Chất liệu:</strong> {{ $specifications[5] }}</li>
                    <li><i class="fas fa-calendar-alt"></i> <strong>Ngày sản xuất:</strong> {{ $specifications[6] }}</li>
                </ul>
            </div>
        </div>
    </div>
</form>
</main>

<style>
/* General Styles */
.container {
    margin-top: 20px;
    padding: 0 15px;
    max-width: 1140px;
}

/* Product Image Styles */
.product-image-container {
    text-align: center;
    margin-bottom: 20px;
    background: #fff;
    padding: 10px;
    border-radius: 6px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
}

.product-image {
    max-width: 90%;
    height: auto;
    max-height: 400px;
    object-fit: contain;
    border-radius: 4px;
}

/* Product Details Styles */
.product-details {
    padding: 15px;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
}

/* Product Header Styles */
.product-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 12px;
}

.product-title {
    font-size: 20px;
    font-weight: 600;
    color: #333;
    margin-bottom: 0;
    line-height: 1.4;
    flex: 1;
    padding-right: 15px;
}

.manufacturer-badge {
    background: #f8f9fa;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 13px;
    color: #666;
    display: flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
    border: 1px solid #eee;
}

.manufacturer-badge i {
    color: #ff523b;
}

.product-price {
    font-size: 20px;
    color: #ff523b;
    font-weight: 600;
    margin-bottom: 8px;
}

.product-stock {
    font-size: 13px;
    color: #666;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Selection Styles */
.size-selection, .color-selection, .quantity-selection {
    margin-bottom: 15px;
}

.size-selection h4, .color-selection h4, .quantity-selection h4 {
    font-size: 15px;
    font-weight: 500;
    color: #333;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.form-control {
    width: 100%;
    padding: 6px 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 13px;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #ff523b;
    outline: none;
}

/* Quantity Styles */
.quantity-wrapper {
    display: flex;
    align-items: center;
    gap: 8px;
}

.quantity-btn {
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 4px;
    color: #333;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.quantity-btn:hover {
    background-color: #ff523b;
    border-color: #ff523b;
    color: #fff;
}

.quantity-input {
    width: 45px;
    height: 28px;
    text-align: center;
    font-size: 13px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #fff;
}

/* Add to Cart Button */
.btn-addCart {
    width: 100%;
    padding: 8px 15px;
    background-color: #ff523b;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-addCart:hover {
    background-color: #333;
}

/* Description Styles */
.product-description {
    margin-top: 25px;
}

.product-description h2 {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.specifications-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.specifications-list li {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 6px 0;
    border-bottom: 1px solid #eee;
    color: #666;
    font-size: 13px;
}

.specifications-list li:last-child {
    border-bottom: none;
}

.specifications-list li strong {
    color: #333;
    font-weight: 500;
    min-width: 90px;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .product-title {
        font-size: 18px;
    }
    
    .product-price {
        font-size: 18px;
    }
    
    .product-description h2 {
        font-size: 16px;
    }
}

@media (max-width: 576px) {
    .container {
        margin-top: 15px;
    }
    
    .product-details {
        padding: 12px;
    }
    
    .btn-addCart {
        padding: 6px 12px;
        font-size: 13px;
    }

    .product-header {
        flex-direction: column;
        gap: 8px;
    }
    
    .product-title {
        padding-right: 0;
    }
    
    .manufacturer-badge {
        align-self: flex-start;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
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

    num.addEventListener('input', function() {
        this.value = quantity;
    });
});
</script>
@endsection