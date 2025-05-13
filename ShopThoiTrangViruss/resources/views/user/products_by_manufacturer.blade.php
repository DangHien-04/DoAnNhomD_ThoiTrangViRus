@extends('user.dashboard_user')  

@section('content')
<!-- Manufacturer Header -->
<div class="manufacturer-header">
    <div class="container">
        <div class="manufacturer-info">
            <div class="manufacturer-logo">
                @if(isset($manufacturer->image_manufacturer))
                    <img src="{{ asset('uploads/manufacturerimage/' . $manufacturer->image_manufacturer) }}" 
                         alt="{{ $manufacturer->name_manufacturer }}" 
                         class="logo-image">
                @else
                    <div class="logo-placeholder">
                        <i class="fa-solid fa-industry"></i>
                    </div>
                @endif
            </div>
            <div class="manufacturer-details">
                <h1>{{ $manufacturer->name_manufacturer }}</h1>
                @if(isset($manufacturer->description_manufacturer))
                    <p>{{ $manufacturer->description_manufacturer }}</p>
                @endif
                <div class="manufacturer-badges">
                    <span class="badge">Chính hãng</span>
                    @if(isset($manufacturer->founding_year))
                        <span class="badge">Thành lập {{ $manufacturer->founding_year }}</span>
                    @endif
                    @if(isset($manufacturer->country))
                        <span class="badge">{{ $manufacturer->country }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Products Section -->
<div class="products-section">
    <div class="container">
        <!-- Filters and Sorting -->
        <div class="products-header">
            <div class="products-count">
                <span>{{ $products->count() }} sản phẩm</span>
            </div>
            <div class="products-controls">
                <div class="view-options">
                    <button class="view-btn active" data-view="grid">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button class="view-btn" data-view="list">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        @if($products->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <h3>Không có sản phẩm nào</h3>
                <p>Hiện tại không có sản phẩm nào từ nhà sản xuất này.</p>
                <a href="{{ route('home.index') }}" class="btn-back">
                    <i class="fas fa-home"></i>
                    Quay lại trang chủ
                </a>
            </div>
        @else
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            <a href="{{ route('product.indexDetailproduct', ['id' => $product->id_product]) }}">
                                <img src="{{ asset('uploads/productimage/' . $product->image_address_product) }}"
                                     alt="{{ $product->name_product }}">
                            </a>
                            @if(isset($product->discount) && $product->discount > 0)
                                <div class="discount-badge">
                                    -{{ $product->discount }}%
                                </div>
                            @endif
                        </div>
                        <div class="product-info">
                            <div class="product-brand">
                                {{ $manufacturer->name_manufacturer }}
                            </div>
                            <h3 class="product-name">
                                <a href="{{ route('product.indexDetailproduct', ['id' => $product->id_product]) }}">
                                    {{ $product->name_product }}
                                </a>
                            </h3>
                            <div class="product-price">
                                <span class="current-price">{{ number_format($product->price_product, 0, ',', '.') }} ₫</span>
                                @if(isset($product->old_price) && $product->old_price > $product->price_product)
                                    <span class="old-price">{{ number_format($product->old_price, 0, ',', '.') }} ₫</span>
                                @endif
                            </div>
                            <a href="{{ route('product.indexDetailproduct', ['id' => $product->id_product]) }}" 
                               class="view-details-btn">
                                <i class="fas fa-eye"></i>
                                Chi tiết
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>

<style>
/* Manufacturer Header */
.manufacturer-header {
    background: linear-gradient(to right, #f8f9fa, #ffffff);
    padding: 40px 0;
    margin-bottom: 40px;
    border-bottom: 1px solid #eee;
}

.manufacturer-info {
    display: flex;
    align-items: center;
    gap: 30px;
}

.manufacturer-logo {
    flex-shrink: 0;
}

.logo-image {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #fff;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
}

.logo-placeholder {
    width: 120px;
    height: 120px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 3px solid #fff;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
}

.logo-placeholder i {
    font-size: 40px;
    color: #666;
}

.manufacturer-details {
    flex-grow: 1;
}

.manufacturer-details h1 {
    font-size: 32px;
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
}

.manufacturer-details p {
    color: #666;
    margin-bottom: 15px;
    line-height: 1.6;
}

.manufacturer-badges {
    display: flex;
    gap: 10px;
}

.badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 500;
    background: #f8f9fa;
    color: #666;
    border: 1px solid #eee;
}

/* Products Section */
.products-section {
    padding-bottom: 60px;
}

.products-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.products-count {
    font-size: 16px;
    color: #666;
}

.products-controls {
    display: flex;
    align-items: center;
    gap: 20px;
}

.view-options {
    display: flex;
    gap: 5px;
}

.view-btn {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 6px;
    color: #666;
    cursor: pointer;
    transition: all 0.3s ease;
}

.view-btn.active {
    background: #333;
    border-color: #333;
    color: #fff;
}

/* Products Grid */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.product-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-image {
    position: relative;
    padding-top: 100%;
    background: #f8f9fa;
}

.product-image img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 20px;
}

.discount-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #ff523b;
    color: #fff;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
}

.product-info {
    padding: 20px;
}

.product-brand {
    font-size: 13px;
    color: #666;
    margin-bottom: 5px;
}

.product-name {
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 10px;
    line-height: 1.4;
}

.product-name a {
    color: #333;
    text-decoration: none;
}

.product-name a:hover {
    color: #ff523b;
}

.product-price {
    margin-bottom: 15px;
}

.current-price {
    font-size: 18px;
    font-weight: 600;
    color: #ff523b;
}

.old-price {
    font-size: 14px;
    color: #999;
    text-decoration: line-through;
    margin-left: 8px;
}

.view-details-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 10px;
    background: #333;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.view-details-btn:hover {
    background: #ff523b;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
}

.empty-icon {
    font-size: 48px;
    color: #ddd;
    margin-bottom: 20px;
}

.empty-state h3 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.empty-state p {
    color: #666;
    margin-bottom: 20px;
}

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: #333;
    color: #fff;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-back:hover {
    background: #ff523b;
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 40px;
}

/* Responsive */
@media (max-width: 991px) {
    .manufacturer-info {
        flex-direction: column;
        text-align: center;
    }

    .manufacturer-badges {
        justify-content: center;
    }

    .products-header {
        flex-direction: column;
        gap: 15px;
    }

    .products-controls {
        width: 100%;
        justify-content: space-between;
    }
}

@media (max-width: 767px) {
    .manufacturer-header {
        padding: 30px 0;
    }

    .manufacturer-details h1 {
        font-size: 24px;
    }

    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }

    .sort-filter {
        flex-direction: column;
        width: 100%;
    }

    .sort-select {
        width: 100%;
    }

    .filter-btn {
        width: 100%;
        justify-content: center;
    }
}

/* Remove filter button styles */
.filter-btn {
    display: none;
}

/* Remove wishlist button styles */
.wishlist-btn {
    display: none;
}

/* Remove rating styles */
.product-rating {
    display: none;
}

.stars {
    display: none;
}

.rating-count {
    display: none;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // View switching functionality
    const viewBtns = document.querySelectorAll('.view-btn');
    const productsGrid = document.querySelector('.products-grid');

    viewBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            viewBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            if (btn.dataset.view === 'list') {
                productsGrid.style.gridTemplateColumns = '1fr';
            } else {
                productsGrid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(250px, 1fr))';
            }
        });
    });
});
</script>
@endsection