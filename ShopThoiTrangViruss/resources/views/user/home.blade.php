@extends('user.dashboard_user')


<!-- Product section-->
@section('content')
<!-- /HEADER -->

<!-- NAVIGATION -->

<!-- /NAVIGATION -->

<!-- Product section-->
<div class="section newproduct">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm mới</h3>
                    <div class="section-nav">
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                @foreach($get6newproducts as $get6newproduct)
                                <!-- product -->
                                <div class="product hover-effect newproduct">
                                    <div class="product-img">
                                        <img src="{{ asset('uploads/productimage/' . $get6newproduct->image_address_product) }} "
                                            alt="" style="width: 100%; height: 250px;">
                                        <div class="product-overlay">
                                            <a href="{{ route('product.indexDetailproduct', ['id' => $get6newproduct->id_product]) }}" class="view-detail-btn">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        @foreach($productsWithCategorys as $productsWithCategory)
                                        @if($get6newproduct->id_category == $productsWithCategory->id_category)
                                        <p class="product-category">{{ $productsWithCategory->name_category }}</p>
                                        @break
                                        @endif
                                        @endforeach
                                        <h3 class="product-name"><a
                                                href="{{ route('product.indexDetailproduct', ['id' => $get6newproduct->id_product]) }}">{{ $get6newproduct->name_product }}</a>
                                        </h3>
                                        <h4 class="product-price">{{ $get6newproduct->price_product }} VNĐ</h4>
                                        <div class="product-btns"></div>
                                    </div>
                                </div>
                                <!-- /product -->
                                @endforeach
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->



<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm</h3>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    @foreach($products as $product)
                    <!-- product -->
                    <div class="col-md-3">
                        <div class="product hover-effect">
                            <div class="product-img">
                                <img src="{{ asset('uploads/productimage/' . $product->image_address_product) }}" alt="" style="width: 100%; height: 250px;">
                                <div class="product-overlay">
                                    <a href="{{ route('product.indexDetailproduct', ['id' => $product->id_product]) }}" class="view-detail-btn">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-body">
                                @foreach($productsWithCategorys as $productsWithCategory)
                                @if($product->id_category == $productsWithCategory->id_category)
                                <p class="product-category">{{ $productsWithCategory->name_category }}</p>
                                @break
                                @endif
                                @endforeach
                                <h3 class="product-name">
                                    <a href="{{ route('product.indexDetailproduct', ['id' => $product->id_product]) }}">
                                        {{ $product->name_product }}
                                    </a>
                                </h3>
                                <h4 class="product-price">{{ $product->price_product }} VNĐ</h4>
                                <div class="product-btns"></div>
                            </div>
                        </div>
                    </div>


                    <!-- /product -->
                    @endforeach

                </div>
            </div>
        </div>
        {{ $products->links() }}
        <!-- /Products tab & slick -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut.</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <li><a href="#">Hot deals</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Cameras</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
<style>
    .input {
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }

    .manufacturer img {
        width: 100%;
        height: auto;
    }

    .manufacturer .item {
        float: right;
    }

    .manufacturer {
        width: 60px;
        height: 20px;
        display: flex;
        border: 2px black solid;
    }

    .product {
        width: 262px;
        height: 362px;
    }

    .newproduct {
        margin-bottom: 80px;
    }

    .dropdown i {
        color: white;
    }

    .product-name a {
        color: black;
    }

    /* Hiệu ứng hover nổi lên + bóng đổ cho tất cả sản phẩm */
.hover-effect {
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
    border-radius: 10px;
}

/* Khi hover vào tất cả các sản phẩm */
.hover-effect:hover {
    transform: scale(1.05);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.25);
}

/* Lớp phủ làm mờ khi hover vào sản phẩm */
.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Hiển thị lớp phủ khi hover */
.hover-effect:hover .product-overlay {
    opacity: 1;
}

/* Nút xem chi tiết đẹp mắt */
.view-detail-btn {
    background: #ffffff;
    padding: 12px;
    border-radius: 50%;
    color: #333;
    font-size: 20px;
    text-decoration: none;
    transition: background 0.3s ease, color 0.3s ease;
}

.view-detail-btn:hover {
    background: #333;
    color: #fff;
}

/* Hiệu ứng đặc biệt cho sản phẩm mới */
.newproduct .hover-effect {
    transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
    border-radius: 10px;
}

/* Khi hover vào sản phẩm mới */
.newproduct .hover-effect:hover {
    transform: scale(1.1);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    border: 2px solid #ff6347; /* Đường viền đỏ cam */
}

/* Lớp phủ làm mờ khi hover vào sản phẩm mới */
.newproduct .product-overlay {
    background: rgba(0, 0, 0, 0.5);
}

/* Nút xem chi tiết cho sản phẩm mới */
.newproduct .view-detail-btn {
    background: #ff6347; /* Màu đỏ cam nổi bật */
    color: #fff;
}

.newproduct .view-detail-btn:hover {
    background: #e53e36; /* Màu khi hover */
    transform: scale(1.1);
}

</style>

</html>
@endsection