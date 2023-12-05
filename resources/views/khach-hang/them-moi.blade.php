@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI KHÁCH HÀNG</h1>
</div>
<form method="POST" action="{{ route('khach-hang.xl-them-moi') }}" class="container">
@csrf
<div class="row">
    <div class="col-md-6">
        <label for="ho_ten" class="form-label">Họ tên:</label>
        <input type="text" class="form-control" name="ho_ten">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" name="email">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="ten_dang_nhap" class="form-label">Tên đăng nhập:</label>
        <input type="text" class="form-control" name="ten_dang_nhap">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="mat-khau" class="form-label">Mật khẩu:</label>
        <input type="text" class="form-control" name="password">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="dien_thoai" class="form-label">Điện thoại:</label>
        <input type="text" class="form-control" name="dien_thoai">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="dia_chi" class="form-label">Địa chỉ:</label>
        <input type="text" class="form-control" name="dia_chi">
    </div>
</div>
<div class="col-md-2">
    <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection