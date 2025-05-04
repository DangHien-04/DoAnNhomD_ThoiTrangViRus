@extends('admin.dashboard')

@section('content')
<main class="addmanufacturer-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Thêm Hãng Sản Xuất</h3>
                    <div class="card-body">
                        <form action="{{ route('manufacturer.addmanufacturer') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-3"><span>Tên hãng sản xuất</span></div>
                                    <div class="col-md-9"> <input type="text" id="name_manufacturer"
                                            class="form-control" name="name_manufacturer" required autofocus></div>
                                </div>
                                @if ($errors->has('name_manufacturer'))
                                <span class="text-danger">{{ $errors->first('name_manufacturer') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-3"><span>Ảnh hãng sản xuất</span></div>
                                    <div class="col-md-9"><input type="file" id="fileToUpload" class="form-control"
                                            name="image_manufacturer" required></div>
                                </div>

                                @if ($errors->has('image_manufacturer'))
                                <span class="text-danger">{{ $errors->first('image_manufacturer') }}</span>
                                @endif
                            </div>
                            <div class="row btn_login">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6"><a href="#"></a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-grid mx-auto">
                                                <button type="submit" class="btn btn-primary btn-block">Lưu</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection