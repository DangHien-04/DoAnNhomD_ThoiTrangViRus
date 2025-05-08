
@extends('admin.dashboard')

<!-- Manufacturer section -->
@section('content')
<main class="listmanufacturer-form py-4">
    <div class="container-fluid px-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h2 class="m-0 text-primary fw-bold"><i class="bi bi-building me-2"></i>Quản Lý Hãng Sản Xuất</h2>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{ route('manufacturer.addmanufacturer') }}" class="btn btn-success shadow-sm">
                            <i class="bi bi-plus-circle me-1"></i>Thêm Hãng Sản Xuất
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" width="80px">Mã Hãng</th>
                                <th>Tên Hãng</th>
                                <th class="text-center" width="200px">Ảnh Hãng</th>
                                <th class="text-center" width="160px">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($manufacturers as $manufacturer)
                            <tr>
                                <td class="text-center fw-bold">{{ $manufacturer->id_manufacturer }}</td>
                                <td class="fw-medium">{{ $manufacturer->name_manufacturer }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('uploads/manufacturerimage/' . $manufacturer->image_manufacturer) }}" 
                                         alt="{{ $manufacturer->name_manufacturer }}" 
                                         class="img-thumbnail" 
                                         style="width: 100px; height: 100px; object-fit: cover;">
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('manufacturer.updateindex', ['id' => $manufacturer->id_manufacturer]) }}" class="btn btn-primary">
                                            <i class="bi bi-pencil-square"></i> Sửa
                                        </a>
                                        <a href="{{ route('manufacturer.deletemanufacturer', ['id' => $manufacturer->id_manufacturer]) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa hãng sản xuất này?')">
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
                    @if ($manufacturers->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{ $manufacturers->previousPageUrl() }}">&laquo;</a></li>
                    @endif

                    @foreach ($manufacturers->getUrlRange(1, $manufacturers->lastPage()) as $page => $url)
                    @if ($page == $manufacturers->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                    @endforeach

                    @if ($manufacturers->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $manufacturers->nextPageUrl() }}">&raquo;</a></li>
                    @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</main>

<style>
    .pagination-container {
        margin-top: 20px;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-link {
        color: #0d6efd;
        border: 1px solid #dee2e6;
        padding: 0.5rem 0.75rem;
        border-radius: 50%;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #f8f9fa;
        border-color: #dee2e6;
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

    .btn {
        transition: all 0.2s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }
</style>
@endsection