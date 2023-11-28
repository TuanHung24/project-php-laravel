@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI SẢN PHẨM</h1>
</div>
<form method="POST" action="{{ route('san-pham.xl-them-moi') }}" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-md-6">
        <label for="ten" class="form-label">Tên:</label>
        <input type="text" class="form-control" name="ten" required>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="mo-ta" class="form-label">Mô tả:</label>
        <input type="text" class="form-control" name="mo_ta">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="gia_ban" class="form-label">Giá bán:</label>
        <input type="text" class="form-control" name="gia_ban">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="so-luong" class="form-label">Số lượng:</label>
        <input type="text" class="form-control" name="so_luong">
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
        <label for="thong_tin" class="form-label">Thông tin:</label>
        <textarea type="textarea" class="form-control" id="thong-tin" name="thong_tin" rows="4" cols="50"></textarea>
    </div>
</div>

<div class=row>
    <div class="col-md-6">
        <label for="hinh_anh[]" class="form-label">Chọn ảnh: </label>
        <input type="file" name="hinh_anh[]" multiple required/>
    </div>
</div>
<div class="col-md-2">
    <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection