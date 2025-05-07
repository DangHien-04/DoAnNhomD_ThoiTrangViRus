@extends('user.dashboard_user')

@section('content')
<main>
    <!-- SECTION: New Products -->
    <div class="section newproduct">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Sản phẩm mới</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="newproduct-slider">
                    @foreach($get6newproducts as $get6newproduct)
                    <div class="product-slide">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{ asset('uploads/productimage/' . $get6newproduct->image_address_product) }}" alt="Sản phẩm" class="img-fluid">
                                <a href="{{ route('product.indexDetailproduct', ['id' => $get6newproduct->id_product]) }}" class="product-detail-icon">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="product-info">
                                <h5 class="product-category">
                                    @foreach($productsWithCategorys as $productsWithCategory)
                                        @if($get6newproduct->id_category == $productsWithCategory->id_category)
                                            {{ $productsWithCategory->name_category }}
                                            @break
                                        @endif
                                    @endforeach
                                </h5>
                                <h4 class="product-name">
                                    <a href="{{ route('product.indexDetailproduct', ['id' => $get6newproduct->id_product]) }}">{{ $get6newproduct->name_product }}</a>
                                </h4>
                                <h4 class="product-price">{{ number_format($get6newproduct->price_product, 0, ',', '.') }} VNĐ</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /SECTION: New Products -->

    <!-- SECTION: All Products -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Tất cả sản phẩm</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-3 col-sm-6">
                    <div class="product-card">
                        <div class="product-img">
                            <img src="{{ asset('uploads/productimage/' . $product->image_address_product) }}" alt="Sản phẩm" class="img-fluid">
                            <a href="{{ route('product.indexDetailproduct', ['id' => $product->id_product]) }}" class="product-detail-icon">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                        <div class="product-info">
                            <h5 class="product-category">
                                @foreach($productsWithCategorys as $productsWithCategory)
                                    @if($product->id_category == $productsWithCategory->id_category)
                                        {{ $productsWithCategory->name_category }}
                                        @break
                                    @endif
                                @endforeach
                            </h5>
                            <h4 class="product-name">
                                <a href="{{ route('product.indexDetailproduct', ['id' => $product->id_product]) }}">{{ $product->name_product }}</a>
                            </h4>
                            <h4 class="product-price">{{ number_format($product->price_product, 0, ',', '.') }} VNĐ</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination-wrapper">
                {{ $products->links() }}
            </div>
        </div>
    </div>
    <!-- /SECTION: All Products -->
</main>

<style>
/* General Styles */
.section-title {
    text-align: center;
    margin-bottom: 30px;
}

.section-title .title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}
.col-md-3.col-sm-6 {
    margin-bottom: 20px; /* Thêm khoảng cách giữa các hàng sản phẩm */
}
.product-card {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    height: 100%;
}

.product-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.product-img {
    position: relative;
    overflow: hidden;
    background-color:rgb(255, 255, 255);
    height: 250px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-img img {
    width: auto;
    height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.product-card:hover .product-img img {
    transform: scale(1.1);
}

.product-detail-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.6);
    color: #fff;
    font-size: 20px;
    padding: 10px 15px;
    border-radius: 50%;
    opacity: 0;
    transition: opacity 0.3s ease, transform 0.3s ease;
    text-decoration: none;
}

.product-card:hover .product-detail-icon {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1.1);
}

.product-detail-icon:hover {
    background-color: #ff523b;
    color: #fff;
}

.product-info {
    padding: 15px;
    text-align: center;
}

.product-category {
    font-size: 12px;
    color: #888;
    margin-bottom: 5px;
}

.product-name a {
    font-size: 14px;
    font-weight: bold;
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.product-name a:hover {
    color: #ff523b;
}

.product-price {
    font-size: 16px;
    color: #ff523b;
    font-weight: bold;
    margin-top: 5px;
}

.pagination-wrapper {
    text-align: center;
    margin-top: 30px;
}

.pagination-wrapper .pagination {
    display: inline-block;
}

.pagination-wrapper .pagination li {
    display: inline;
    margin: 0 5px;
}

.pagination-wrapper .pagination li a {
    color: #333;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.pagination-wrapper .pagination li a:hover {
    background-color: #ff523b;
    color: #fff;
}

/* Slick Carousel Customization */
.newproduct-slider {
    position: relative;
    padding: 0 25px;
    margin-bottom: 30px;
}

.product-slide {
    padding: 0 10px;
}

.slick-prev, 
.slick-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #ff523b;
    color: #fff;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex !important;
    align-items: center;
    justify-content: center;
    z-index: 1;
    cursor: pointer;
    border: none;
    font-size: 16px;
}

.slick-prev {
    left: -5px;
}

.slick-next {
    right: -5px;
}

.slick-prev:hover, 
.slick-next:hover {
    background-color: #333;
}

.slick-prev:focus, 
.slick-next:focus {
    outline: none;
}

.slick-slide {
    margin: 0 10px;
}

.slick-list {
    margin: 0 -10px;
}

.slick-track {
    display: flex;
    align-items: stretch;
}

.slick-disabled {
    opacity: 0.5;
    cursor: default;
}
</style>

<!-- Scripts - Place before closing body tag -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function(){
        $('.newproduct-slider').slick({
            slidesToShow: 4, // Hiển thị 4 sản phẩm cùng lúc
            slidesToScroll: 1, // Cuộn 1 sản phẩm mỗi lần
            infinite: true, // Vòng lặp vô hạn
            arrows: true, // Hiển thị nút điều hướng
            autoplay: true, // Tự động chuyển động
            autoplaySpeed: 3000, // Thời gian chuyển động (3000ms = 3 giây)
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
@endsection