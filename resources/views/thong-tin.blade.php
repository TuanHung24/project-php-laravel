@extends('master')
@section('content')
 <div class="profile">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Thông tin cá nhân</h4>
    </div>
        <img src="{{asset(Auth::user()->avatar_url)}}"/>
        <p>Họ tên: {{Auth::user()->ho_ten}}</p>
        <p>Email: {{Auth::user()->email}}</p>
        <p>Điện thoại: {{Auth::user()->dien_thoai}}</p>
        <p>Địa chỉ: {{Auth::user()->dia_chi}}</p>
        <a href="">Đổi Mật khẩu</a>
</div>
 
@endsection