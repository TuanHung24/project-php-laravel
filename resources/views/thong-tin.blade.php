@extends('master')
@section('content')
 <div class="profile">
    <h4>Thông tin cá nhân</h4>
    <img src="{{asset(Auth::user()->avatar)}}"/>
    <p>Họ tên: {{Auth::user()->ho_ten}}</p>
    <p>Email: {{Auth::user()->email}}</p>
    <p>Điện thoại: {{Auth::user()->dien_thoai}}</p>
    <p>Địa chỉ: {{Auth::user()->dia_chi}}</p>
</div>
@endsection