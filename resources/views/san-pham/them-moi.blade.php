@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI SẢN PHẨM</h1>
</div>
<form method="POST" action="{{ route('san-pham.xl-them-moi') }}" enctype="multipart/form-data" class="container">
@csrf
<h5>Thông tin sản phẩm</h5>
<div class="row">
    <div class="col-md-6">
        <label for="ten" class="form-label">Tên:</label>
        <input type="text" class="form-control" name="ten">
        @error('ten')
        <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="do-phan-giai" class="form-label">Độ phân giải:</label>
        <input type="text" id="do-phan-giai" class="form-control" name="do_phan_giai">
    </div>
    <div class="col-md-3">
        <label for="trong-luong" class="form-label">Trọng lượng:</label>
        <input type="text" id="trong-luong" class="form-control" name="trong_luong">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="mo-ta" class="form-label">Mô tả:</label>
        <input type="text" id="mo-ta"class="form-control" name="mo_ta">
    </div>
    <div class="col-md-3">
        <label for="kich-thuoc" class="form-label">Kích thước:</label>
        <input type="text" id="kich-thuoc" class="form-control" name="chip">
    </div>
    <div class="col-md-3">
        <label for="man-hinh" class="form-label">Màn hình:</label>
        <textarea type="text" id="man-hinh" class="form-control" name="man_hinh"></textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="gia-ban" class="form-label">Giá bán:</label>
        <input type="text" id="gia-ban" class="form-control" name="gia_ban">
    </div>
    <div class="col-md-3">
        <label for="he-dieu-hanh" class="form-label">Hệ điều hành:</label>
        <input type="text" id="he-dieu-hanh" class="form-control" name="he_dieu_hanh">
    </div>
    <div class="col-md-3">
        <label for="ram" class="form-label">Ram:</label>
        <input type="text" id="ram" class="form-control" name="ram">
</div>
    
</div>
<div class="row">
    <div class="col-md-6">
        <label for="so-luong" class="form-label">Số lượng:</label>
        <input type="text" id="so-luong" class="form-control" name="so_luong">
    </div>
    <div class="col-md-3">
        <label for="camera" class="form-label">Camera:</label>
        <input type="text" id="camera" class="form-control" name="camera">
    </div>
    <div class="col-md-3">
        <label for="pin" class="form-label">Pin:</label>
        <input type="text" id="pin" class="form-control" name="pin">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="loai-san-pham" class="form-label">Loại sản phẩm:</label>
        <select name="loai_san_pham" class="form-select">
            @foreach($dsLoaiSanPham as $LoaiSanPham)
            <option value="{{$LoaiSanPham->id}}">{{$LoaiSanPham->ten}}</option>
            @endforeach
        </select>
    </div>
    
</div>
<div class="row">
    <div class="col-md-6">
        <label for="thong-tin" class="form-label">Thông tin:</label>
        <textarea type="textarea" class="form-control" id="thong-tin" name="thong_tin" rows="4" cols="50"></textarea>
    </div>
    
    
</div>

<div class=row>
    <div class="col-md-6">
        <label for="hinh_anh[]" class="form-label">Chọn ảnh: </label>
        <input type="file" name="hinh_anh[]" multiple/>
        
    </div>
        @error('hinh-anh')
        <span class="error-message">{{$message}}</span>
        @enderror
</div>
<div class="col-md-2">
    <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection