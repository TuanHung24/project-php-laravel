@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI NHÂN VIÊN</h1>
</div>
<form method="POST" action="{{ route('nhan-vien.xl-them-moi') }}" class="container" id="add" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-md-6">
        <label for="ho_ten" class="form-label">Họ tên:</label>
        <input type="text" class="form-control" name="ho_ten" id="ho-ten" value="{{old('ho_ten')}}">
        @error('ho_ten')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="dien_thoai" class="form-label">Điện thoại:</label>
        <input type="text" class="form-control" name="dien_thoai" id='dien-thoai' value="{{old('dien_thoai')}}">
        @error('dien_thoai')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" value="{{old('email')}}">
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="dia_chi" class="form-label">Địa chỉ:</label>
        <input type="text" class="form-control" name="dia_chi" value="{{old('dia_chi')}}">
        @error('dia_chi')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="username" class="form-label">Tên tài khoản:</label>
        <input type="text" class="form-control" name="username" id="username" value="{{old('username')}}"> 
        @error('username')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="password" class="form-label">Mật khẩu:</label>
        <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
        @error('password')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class=row>
    <div class="col-md-6">
        <label for="hinh_anh" class="form-label">Chọn ảnh đại diện:</label>
        <input type="file" name="hinh_anh"/>
        @error('hinh-anh')
            <span class="error-message">{{$message}}</span>
        @enderror
    </div>
</div>
<div class="col-md-2">
    <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection