@extends('master')

@section('content')
 <span class="thong_ke">
    <div class="count_container count_sp">
    <span data-feather="box" class="align-text-bottom" id="icon-tk"></span>
    <h5>Số lượng sản phẩm</h5>
    <span>Đang có: {{$soLuongSanPham}}</span><br/>
    <span>Tổng tiền nhập hàng: {{$tongTienGiaNhap}}đ</span>
    </div>
    <div class="count_container count_hd">
    <span data-feather="shopping-bag" class="align-text-bottom" id="icon-tk"></span>
    <h5>Số lượng hóa đơn</h5>
    <span>Đã đặt: {{$hoaDon}}</span><br/>
    <span>Tổng tiền hóa đơn xuất: {{$tongTienHoaDon}}đ</span>
    </div>
    <div class="count_container count_nd">
    <span data-feather="users" class="align-text-bottom" id="icon-tk"></span>
    <h5>Số lượng người dùng</h5>
    <span>Tổng số: {{$khachHang}}</span>
    </div>
 </span>
@endsection