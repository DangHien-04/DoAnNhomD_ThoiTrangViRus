@extends('user.dashboard_user')  

@section('content')
<!-- Hero section with manufacturer brand -->
<div class="manufacturer-hero" style="background-color: #f8f9fa; position: relative; overflow: hidden;">
    <div class="container-fluid px-0">
        <div class="manufacturer-cover" style="height: 200px; background-color: #e9ecef; position: relative; overflow: hidden;">
            <!-- Cover background - can be dynamically set if you have a cover_image field -->
            <div class="cover-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(90deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.1) 100%);"></div>
        </div>
    </div>
    
    <div class="container position-relative" style="margin-top: -70px;">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap align-items-end">
                    <!-- Manufacturer logo -->
                    <div class="me-4 mb-3">
                        @if(isset($manufacturer->image_manufacturer))
                            <div class="manufacturer-logo shadow">
                                <img src="{{ asset('uploads/manufacturerimage/' . $manufacturer->image_manufacturer) }}" 
                                     alt="{{ $manufacturer->name_manufacturer }}" 
                                     class="rounded-circle border border-3 border-white" 
                                     style="width: 140px; height: 140px; object-fit: cover; background-color: white;">
                            </div>
                        @else
                            <div class="rounded-circle bg-white shadow-lg d-flex align-items-center justify-content-center border border-3 border-white" 
                                 style="width: 140px; height: 140px;">
                                <i class="fa-solid fa-industry text-primary" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Manufacturer info -->
                    <div class="manufacturer-info mb-3">
                        <h1 class="fw-bold mb-2 display-6">{{ $manufacturer->name_manufacturer }}</h1>
                        @if(isset($manufacturer->description_manufacturer))
                            <p class="text-muted mb-0 lead">{{ $manufacturer->description_manufacturer }}</p>
                        @endif
                        <!-- Conditional badges -->
                        <div class="mt-2">
                            <span class="badge bg-primary rounded-pill">Chính hãng</span>
                            @if(isset($manufacturer->founding_year))
                                <span class="badge bg-secondary rounded-pill">Thành lập {{ $manufacturer->founding_year }}</span>
                            @endif
                            @if(isset($manufacturer->country))
                                <span class="badge bg-info rounded-pill">{{ $manufacturer->country }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="container py-5">
    <!-- Filters and sorting -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div class="d-flex align-items-center mb-2 mb-md-0">
            <h5 class="mb-0 me-3">{{ $products->count() }} sản phẩm</h5>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fas fa-th-large"></i></button>
                <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fas fa-list"></i></button>
            </div>
        </div>
        <div class="d-flex gap-2">
            <select class="form-select form-select-sm" aria-label="Sort products">
                <option selected>Sắp xếp theo</option>
                <option value="1">Giá: Thấp đến cao</option>
                <option value="2">Giá: Cao đến thấp</option>
                <option value="3">Mới nhất</option>
                <option value="4">Bán chạy nhất</option>
            </select>
            <button class="btn btn-outline-primary btn-sm"><i class="fas fa-filter me-1"></i> Lọc</button>
        </div>
    </div>

    @if($products->isEmpty())
        <div class="alert alert-light text-center p-5 shadow-sm rounded-3">
            <img src="{{ asset('img/empty-products.svg') }}" alt="No products" class="img-fluid mb-3" style="max-height: 150px;">
            <h4>Không có sản phẩm nào từ nhà sản xuất này</h4>
            <p class="text-muted">Vui lòng quay lại sau hoặc khám phá các nhà sản xuất khác.</p>
            <a href="{{ route('home.index') }}" class="btn btn-primary mt-2">
                <i class="fas fa-home me-2"></i>Quay lại trang chủ
            </a>
        </div>
    @else
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 product-card border-0 shadow-sm rounded-3 overflow-hidden">
                        <!-- Badge for discounts, new products, etc. -->
                        @if(isset($product->discount) && $product->discount > 0)
                            <div class="position-absolute top-0 start-0 p-2">
                                <span class="badge bg-danger">-{{ $product->discount }}%</span>
                            </div>
                        @endif
                        
                        <!-- Quick actions -->
                        <div class="position-absolute top-0 end-0 p-2">
                            <button class="btn btn-light btn-sm rounded-circle shadow-sm product-action-btn" title="Yêu thích">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                        
                        <!-- Product image -->
                        <div class="product-img-wrapper text-center position-relative" style="height: 220px; background-color: #f8f9fa;">
                            <a href="{{ route('product.indexDetailproduct', ['id' => $product->id_product]) }}">
                                <img src="{{ asset('uploads/productimage/' . $product->image_address_product) }}"
                                     alt="{{ $product->name_product }}"
                                     class="product-img"
                                     style="max-height: 220px; max-width: 100%; object-fit: contain; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            </a>
                        </div>
                        
                        <!-- Product details -->
                        <div class="card-body p-3 d-flex flex-column">
                            <!-- Product brand -->
                            <div class="text-muted small mb-1">
                                {{ $manufacturer->name_manufacturer }}
                            </div>
                            
                            <!-- Product name -->
                            <h5 class="product-name">
                                <a href="{{ route('product.indexDetailproduct', ['id' => $product->id_product]) }}" class="text-decoration-none text-dark">
                                    {{ $product->name_product }}
                                </a>
                            </h5>
                            
                            <!-- Rating - for UI purposes only, uses random data -->
                            <div class="mb-2">
                                <div class="rating">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                    <span class="ms-1 text-muted small">({{ rand(10, 100) }})</span>
                                </div>
                            </div>
                            
                            <!-- Price -->
                            <div class="d-flex align-items-center mb-3">
                                <span class="fw-bold fs-5 text-primary">{{ number_format($product->price_product, 0, ',', '.') }} ₫</span>
                                @if(isset($product->old_price) && $product->old_price > $product->price_product)
                                    <span class="text-muted text-decoration-line-through ms-2">
                                        {{ number_format($product->old_price, 0, ',', '.') }} ₫
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Action buttons -->
                            <div class="mt-auto d-flex gap-2">
                                <a href="{{ route('product.indexDetailproduct', ['id' => $product->id_product]) }}"
                                   class="btn btn-primary flex-grow-1">
                                    <i class="fas fa-eye me-1"></i> Chi tiết
                                </a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $products->links() }}
        </div>
    @endif
</div>

<style>
    /* Premium styling */
    .manufacturer-hero {
        margin-bottom: 1rem;
    }
    
    .manufacturer-logo {
        position: relative;
        z-index: 5;
    }
    
    .product-card {
        transition: all 0.3s ease;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
    
    .product-name {
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 48px;
    }
    
    .product-name a:hover {
        color: #0d6efd !important;
    }
    
    .product-img {
        transition: transform 0.5s ease;
    }
    
    .product-card:hover .product-img {
        transform: translate(-50%, -50%) scale(1.08);
    }
    
    .product-action-btn {
        width: 32px;
        height: 32px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.7;
        transition: all 0.2s ease;
    }
    
    .product-action-btn:hover {
        opacity: 1;
        background-color: #0d6efd;
        color: white;
    }
    
    .quick-add-to-cart {
        width: 42px;
        height: 38px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .rating {
        font-size: 0.8rem;
    }
    
    /* Responsive improvements */
    @media (max-width: 767px) {
        .manufacturer-hero {
            text-align: center;
        }
        
        .manufacturer-logo {
            margin: 0 auto 1rem auto;
        }
        
        .manufacturer-info {
            text-align: center;
            width: 100%;
        }
    }
</style>

<!-- Add JavaScript for enhanced functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quick add to cart functionality
    const quickAddButtons = document.querySelectorAll('.quick-add-to-cart');
    quickAddButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            // Animation effect
            this.innerHTML = '<i class="fas fa-check"></i>';
            this.classList.remove('btn-outline-primary');
            this.classList.add('btn-success');
            
            // Reset after 2 seconds
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-cart-plus"></i>';
                this.classList.remove('btn-success');
                this.classList.add('btn-outline-primary');
            }, 2000);
            
            // Here you would add the actual cart functionality
            console.log('Product added to cart:', productId);
        });
    });
});
</script>
@endsection