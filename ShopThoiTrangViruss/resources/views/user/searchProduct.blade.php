@extends('user.dashboard_user')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Kết quả tìm kiếm cho: <strong>"{{ $keyword }}"</strong></h2>

    @if($products->isEmpty())
        <div class="alert alert-warning text-center">
            Không tìm thấy sản phẩm nào phù hợp với từ khóa <strong>"{{ $keyword }}"</strong>.
        </div>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="text-center p-3" style="background-color: #f9f9f9;">
                            <img src="{{ asset('uploads/productimage/' . $product->image_address_product) }}"
                                 alt="{{ $product->name_product }}"
                                 class="img-fluid"
                                 style="max-height: 200px; object-fit: contain;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-2">{{ $product->name_product }}</h5>
                            <p class="card-text text-danger mb-3">{{ number_format($product->price_product, 0, ',', '.') }} VND</p>
                            <a href="{{ route('product.indexDetailproduct', ['id' => $product->id_product]) }}"
                               class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->appends(['keyword' => $keyword])->links() }}
        </div>
    @endif
</div>
@endsection
