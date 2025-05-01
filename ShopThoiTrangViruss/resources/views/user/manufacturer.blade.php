@extends('user.dashboard_user')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Các Hãng Sản Xuất</h2>

    <div class="row">
        @forelse ($manufacturers as $manufacturer)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 text-center shadow">
                    <img src="{{ asset('uploads/manufacturerimage/' . $manufacturer->image_manufacturer) }}" 
                         class="card-img-top p-3" 
                         alt="{{ $manufacturer->name_manufacturer }}" 
                         style="height: 150px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $manufacturer->name_manufacturer }}</h5>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Không có hãng sản xuất nào được tìm thấy.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
