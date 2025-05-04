@extends('admin.dashboard')

<!-- Product section-->
@section('content')
<main class="listproduct-form py-4">
    <div class="container-fluid px-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h2 class="m-0 text-primary fw-bold"><i class="bi bi-box-seam me-2"></i>Quản Lý Sản Phẩm</h2>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{ route('product.addproduct') }}" class="btn btn-success shadow-sm">
                            <i class="bi bi-plus-circle me-1"></i>Thêm Sản Phẩm
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" width="80px">Mã SP</th>
                                <th>Tên sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Hãng SX</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-end">Giá</th>
                                <th class="text-center">Ảnh</th>
                                <th>Kích thước</th>
                                <th>Màu sắc</th>
                                <th>Mô tả</th>
                                <th>Thông số</th>
                                <th class="text-center" width="160px">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="text-center fw-bold">{{ $product->id_product }}</td>
                                <td class="fw-medium">{{ $product->name_product }}</td>
                                <td>
                                    @foreach($categorys as $category)
                                    @if($product->id_category == $category->id_category)
                                    <span class="badge bg-info text-dark">{{ $category->name_category }}</span>
                                    @break
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($manufacturers as $manufacturer)
                                    @if($product->id_manufacturer == $manufacturer->id_manufacturer)
                                    <span class="badge bg-secondary text-white">{{ $manufacturer->name_manufacturer }}</span>
                                    @break
                                    @endif
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-primary rounded-pill">{{ $product->quantity_product }}</span>
                                </td>
                                <td class="text-end fw-bold">{{ number_format($product->price_product, 0, ',', '.') }} đ</td>
                                <td class="text-center">
                                    <img src="{{ asset('uploads/productimage/' . $product->image_address_product) }}"
                                        class="img-thumbnail product-img" alt="{{ $product->name_product }}">
                                </td>
                                <td>
                                    @if($product->sizes)
                                    @foreach(explode(',', $product->sizes) as $size)
                                    <span class="badge bg-dark me-1">{{ trim($size) }}</span>
                                    @endforeach
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($product->colors)
                                    @foreach(explode(',', $product->colors) as $color)
                                    <span class="badge bg-light text-dark border me-1">{{ trim($color) }}</span>
                                    @endforeach
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-truncate d-inline-block" style="max-width: 150px;"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="{{ $product->describe_product }}">
                                        {{ $product->describe_product }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-truncate d-inline-block" style="max-width: 150px;"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="{{ $product->specifications }}">
                                        {{ $product->specifications }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('product.indexUpdateproduct', ['id' => $product->id_product]) }}"
                                            class="btn btn-primary">
                                            <i class="bi bi-pencil-square"></i> Sửa
                                        </a>
                                        <a href="{{ route('product.deleteproduct', ['id' => $product->id_product]) }}"
                                            class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                            <i class="bi bi-trash"></i> Xóa
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 pagination-container mt-4">
                <ul class="pagination justify-content-center m-0">
                    @if ($products->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}">&laquo;</a></li>
                    @endif

                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    @if ($page == $products->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                    @endforeach

                    @if ($products->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">&raquo;</a></li>
                    @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</main>

<style>
    /* Khoảng cách giữa bảng sản phẩm và thanh pagination */
    .pagination-container {
        margin-top: 20px;
        /* Tăng khoảng cách phía trên */
    }

    /* Tùy chỉnh giao diện thanh pagination */
    .pagination .page-item {
        margin: 0 5px;
        /* Khoảng cách giữa các nút */
    }

    .pagination .page-link {
        color: #0d6efd;
        border: 1px solid #dee2e6;
        padding: 0.5rem 0.75rem;
        border-radius: 50%;
        /* Nút tròn */
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Hiệu ứng đổ bóng */
    }

    .pagination .page-link:hover {
        background-color: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }

    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.3);
        /* Hiệu ứng đổ bóng khi active */
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }

    .listproduct-form .product-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease;
    }

    .listproduct-form .product-img:hover {
        transform: scale(1.8);
        z-index: 100;
    }

    .table th {
        font-weight: 600;
        white-space: nowrap;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table-striped>tbody>tr:nth-of-type(odd)>* {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Hiệu ứng nút */
    .btn {
        transition: all 0.2s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    /* Pagination custom */
    .pagination {
        margin-bottom: 0;
    }

    .page-link {
        color: #0d6efd;
        border-radius: 3px;
        margin: 0 2px;
    }

    .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
</style>

<script>
    // Kích hoạt các tooltip
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection