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
                                <h5 class="product-manufacturer">
                                    @foreach($productsWithManufacturers as $productsWithManufacturer)
                                        @if($get6newproduct->id_manufacturer == $productsWithManufacturer->id_manufacturer)
                                            {{ $productsWithManufacturer->name_manufacturer }}
                                            @break
                                        @endif
                                    @endforeach
                                </h5>
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
                            <h5 class="product-manufacturer">
                                @foreach($productsWithManufacturers as $productsWithManufacturer)
                                    @if($product->id_manufacturer == $productsWithManufacturer->id_manufacturer)
                                        {{ $productsWithManufacturer->name_manufacturer }}
                                        @break
                                    @endif
                                @endforeach
                            </h5>
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
    margin-bottom: 40px;
    position: relative;
}

.section-title .title {
    font-size: 28px;
    font-weight: 700;
    color: #333;
    text-transform: uppercase;
    position: relative;
    padding-bottom: 15px;
}

.section-title .title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background-color: #ff523b;
}

.col-md-3.col-sm-6 {
    margin-bottom: 30px;
}

.product-card {
    background: #fff;
    border: none;
    border-radius: 15px;
    overflow: hidden;
    margin-bottom: 20px;
    transition: all 0.3s ease;
    position: relative;
    height: 100%;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

.product-img {
    position: relative;
    overflow: hidden;
    background-color: #fff;
    height: 280px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.product-img img {
    width: auto;
    height: 100%;
    object-fit: contain;
    transition: transform 0.5s ease;
}

.product-card:hover .product-img img {
    transform: scale(1.1);
}

.product-detail-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 82, 59, 0.9);
    color: #fff;
    font-size: 18px;
    padding: 12px 18px;
    border-radius: 50%;
    opacity: 0;
    transition: all 0.3s ease;
    text-decoration: none;
    z-index: 2;
}

.product-card:hover .product-detail-icon {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1.1);
}

.product-detail-icon:hover {
    background-color: #333;
    color: #fff;
}

.product-info {
    padding: 20px;
    text-align: center;
    background: #fff;
}

.product-category {
    font-size: 13px;
    color: #888;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.product-name {
    margin: 10px 0;
}

.product-name a {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 44px;
}

.product-name a:hover {
    color: #ff523b;
}

.product-manufacturer {
    font-size: 14px;
    color: #666;
    margin: 8px 0;
    font-style: italic;
    font-weight: 500;
}

.product-price {
    font-size: 18px;
    color: #ff523b;
    font-weight: 700;
    margin-top: 10px;
}

.pagination-wrapper {
    text-align: center;
    margin-top: 40px;
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
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.pagination-wrapper .pagination li a:hover {
    background-color: #ff523b;
    color: #fff;
    border-color: #ff523b;
}

/* Slick Carousel Customization */
.newproduct-slider {
    position: relative;
    padding: 0 30px;
    margin-bottom: 40px;
}

.product-slide {
    padding: 0 15px;
}

.slick-prev, 
.slick-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #ff523b;
    color: #fff;
    border-radius: 50%;
    width: 45px;
    height: 45px;
    display: flex !important;
    align-items: center;
    justify-content: center;
    z-index: 1;
    cursor: pointer;
    border: none;
    font-size: 18px;
    transition: all 0.3s ease;
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
    transform: translateY(-50%) scale(1.1);
}

.slick-prev:focus, 
.slick-next:focus {
    outline: none;
}

.slick-slide {
    margin: 0 15px;
}

.slick-list {
    margin: 0 -15px;
}

.slick-track {
    display: flex;
    align-items: stretch;
}

.slick-disabled {
    opacity: 0.5;
    cursor: default;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .product-img {
        height: 220px;
    }
    
    .product-name a {
        font-size: 14px;
        height: 40px;
    }
    
    .product-price {
        font-size: 16px;
    }
    
    .section-title .title {
        font-size: 24px;
    }
}

@media (max-width: 576px) {
    .product-img {
        height: 200px;
    }
    
    .product-name a {
        font-size: 13px;
        height: 36px;
    }
    
    .product-price {
        font-size: 15px;
    }
    
    .section-title .title {
        font-size: 20px;
    }
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