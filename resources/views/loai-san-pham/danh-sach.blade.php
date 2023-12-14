@extends('master')

@section('content')
<form action="{{route('loai-san-pham.tim-kiem')}}" class="submit_search" id="search-form">
    <label class="label_title">Nhập tên loại sản phẩm:</label>
    <div class="Search">
        <input type="search" class="form-control form-control-dark" name="search_name" value="{{$reQuest ?? null}}" placeholder="Tìm kiếm..." aria-label="Search" />
        <button class="btn btn-primary seach" type="submit"><span data-feather="search"></span></button>
    </div>
</form>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><span data-feather="list" ></span>DANH SÁCH LOẠI SẢN PHẨM</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('loai-san-pham.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
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
                <th>Tên</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dsLoaiSanPham as $loaiSanPham)
        <tr>
            <td>{{ $loaiSanPham->id }}</td>
            <td>{{ $loaiSanPham->ten }}</td>
            <?php
            if ($loaiSanPham->trang_thai == true) {
                $trang_thai = "Hoạt động";
            } else {
                $trang_thai = "Không hoạt động";
            }
            ?>
            <td>{{ $trang_thai }}</td>
            <td class="chuc-nang">
                <a href="{{ route('loai-san-pham.cap-nhat', ['id' => $loaiSanPham->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span></a> |
                <a href="{{ route('loai-san-pham.xoa', ['id' => $loaiSanPham->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>
            </td>
        <tr>
            @endforeach
    </table>
</div>
@endsection