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
    <h1 class="h2"><span data-feather="list" ></span>DANH SÁCH PHIẾU NHẬP</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('nhap-hang.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Mã phiếu nhập</th>
                <th>Nhà cung cấp</th>
                <th>Ngày nhập</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dsPhieuNhap as $phieuNhap)
        <tr>
            <td>{{ $phieuNhap->id }}</td>
            <td>{{ $phieuNhap->nha_cung_cap->ten }}</td>
            <td>{{ $phieuNhap->ngay_nhap }}</td>
            <td>{{ $phieuNhap->tong_tien }}</td>
            <?php
            if ($phieuNhap->trang_thai == true) {
                $trang_thai = "Hoạt động";
            } else {
                $trang_thai = "Không hoạt động";
            }
            ?>
            <td>{{ $trang_thai }}</td>
            <td class="chuc-nang">
                <a href="{{ route('nhap-hang.chi-tiet', ['id' => $phieuNhap->id]) }}" class="btn btn-outline-info"><span data-feather="chevrons-right"></span></a>|
                <a href="{{ route('nhap-hang.xoa', ['id' => $phieuNhap->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>|
                <a href="{{ route('pdf.nhap-hang',['id' => $phieuNhap->id]) }}" class="btn btn-outline-secondary"><span data-feather="download"></span></a>
            </td>
        <tr>
            @endforeach
    </table>
</div>
@endsection