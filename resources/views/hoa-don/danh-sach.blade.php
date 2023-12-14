@extends('master')

@section('content')
<form action="{{route('hoa-don.tim-kiem')}}" class="submit_search" id="search-form">
    <label class="label_title">Nhập tên khách hàng:</label>
    <div class="Search">
        <input type="search" class="form-control form-control-dark" name="search_name" value="{{$reQuest ?? null}}" placeholder="Tìm kiếm..." aria-label="Search" />
        <button class="btn btn-primary seach" type="submit"><span data-feather="search"></span></button>
    </div>
</form>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><span data-feather="list" ></span>DANH SÁCH HÓA ĐƠN</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('hoa-don.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
        </div>
    </div>
</div>
@if(session('thong_bao'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div> 
              {{session('thong_bao')}}
        </div>
    </div>
@endif
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Nhân viên</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dsHoaDon as $hoaDon)
        <tr>
            <td>{{ $hoaDon->id }}</td>
            <td>{{ $hoaDon->quan_tri->ho_ten}}</td>
            <td>{{ $hoaDon->khach_hang }}</td>
            <td>{{ $hoaDon->tong_tien }}</td>
            <td>{{ $hoaDon->ngay_tao }}</td>
            <?php
            if ($hoaDon->trang_thai == true) {
                $trang_thai = "Hoạt động";
            } else {
                $trang_thai = "Không hoạt động";
            }
            ?>
            <td>{{ $trang_thai }}</td>
            <td class="chuc-nang">
                <a href="{{ route('hoa-don.chi-tiet', ['id' => $hoaDon->id]) }}" class="btn btn-outline-info"><span data-feather="chevrons-right"></span></a>|
                <a href="{{ route('hoa-don.xoa', ['id' => $hoaDon->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>|
                <a href="{{ route('pdf.hoa-don',['id' => $hoaDon->id]) }}" class="btn btn-outline-secondary"><span data-feather="download"></span></a>
            </td>
        <tr>
            @endforeach
    </table>
</div>
@endsection