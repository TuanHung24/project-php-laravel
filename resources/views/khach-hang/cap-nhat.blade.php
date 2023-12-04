@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT KHÁCH HÀNG</h1>
</div>
<form class="container" method="POST" action="{{ route('khach-hang.xl-cap-nhat', ['id' => $khachHang->id]) }}">
   @csrf
   <div class="row">
        <div class="col-md-6">
            <label for="ho_ten" class="form-label">Họ tên:</label>
            <input type="text" class="form-control" name="ho_ten" value="{{$khachHang->ho_ten}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="email" class="form-label">Email:</label>
            <input type="text" class="form-control" name="email" value="{{$khachHang->email}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="ten_dang_nhap" class="form-label">Tên đăng nhập:</label>
            <input type="text" class="form-control" name="ten_dang_nhap" value="{{$khachHang->ten_dang_nhap}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="dien_thoai" class="form-label">Điện thoại:</label>
            <input type="text" class="form-control" name="dien_thoai" value="{{$khachHang->dien_thoai}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="dia_chi" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" name="dia_chi" value="{{$khachHang->dia_chi}}">
        </div>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" class="Luu"><span data-feather="save"></span>Lưu</button>
    </div>
</form>
@endsection