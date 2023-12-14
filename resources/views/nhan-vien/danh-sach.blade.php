@extends('master')


@section('content')
<form action="{{route('nhan-vien.tim-kiem')}}" class="submit_search" id="search-form">
    <label class="label_title">Nhập tên nhân viên:</label>
    <div class="Search">
        <input type="search" class="form-control form-control-dark" name="search_name" value="{{$reQuest ?? null}}" placeholder="Tìm kiếm..." aria-label="Search" />
        <button class="btn btn-primary seach" type="submit"><span data-feather="search"></span></button>
    </div>
</form>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><span data-feather="list" ></span>DANH SÁCH NHÂN VIÊN</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('nhan-vien.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
        </div>
    </div>
</div>
@if(session('thong_bao'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div> 
              {{session('thong_bao')}}
        </div>
    </div>
@endif
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Họ tên</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Username</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dsQuanTri as $quanTri)
        <tr>
            <td>{{ $quanTri->id }}</td>
            <td>{{ $quanTri->ho_ten }}</td>
            <td>{{ $quanTri->dien_thoai }}</td>
            <td>{{ $quanTri->email }}</td>
            <td>{{ $quanTri->dia_chi }}</td>
            <td>{{ $quanTri->username }}</td>
            <?php
            if ($quanTri->trang_thai == 1) {
                $trang_thai = "Hoạt động";
            } else {
                $trang_thai = "Không hoạt động";
            }
            ?>
            <td>{{ $trang_thai }}</td>
            <td class="chuc-nang">
                <a href="{{ route('nhan-vien.cap-nhat', ['id' => $quanTri->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span></a> |
                <a href="{{ route('nhan-vien.xoa', ['id' => $quanTri->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>
            </td>
        <tr>
            @endforeach
    </table>
</div>
@endsection