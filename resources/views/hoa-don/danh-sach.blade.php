@extends('master')


@section('page-sw')
@if(session('thong_bao'))
    <script>
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: "{{session('thong_bao')}}",
        showConfirmButton: true,
        timer: 3000
        })
    </script>
@endif
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH HÓA ĐƠN</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('hoa-don.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a> 
        </div>
    </div>
</div>

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
        <td>{{ $hoaDon->nhan_vien->ho_ten}}</td>
        <td>{{ $hoaDon->khach_hang }}</td>
        <td>{{ $hoaDon->tong_tien }}</td>
        <td>{{ $hoaDon->ngay_tao }}</td>
        <?php
        if($hoaDon->trang_thai==true)
        {
            $trang_thai="Hoạt động";
        }
        else
        {
            $trang_thai="Không hoạt động";
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
@endsection
</div>