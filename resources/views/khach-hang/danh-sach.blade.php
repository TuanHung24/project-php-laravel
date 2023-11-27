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
    <h1 class="h2"><span data-feather="list" ></span>DANH SÁCH KHÁCH HÀNG</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('khach-hang.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Tên đăng nhập</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dskhachHang as $khachHang)
        <tr>
            <td>{{ $khachHang->id }}</td>
            <td>{{ $khachHang->ho_ten }}</td>
            <td>{{ $khachHang->email }}</td>
            <td>{{ $khachHang->ten_dang_nhap }}</td>
            <td>{{ $khachHang->dien_thoai }}</td>
            <td>{{ $khachHang->dia_chi }}</td>
            <td class="chu-nang">
                <a href="{{ route('khach-hang.cap-nhat', ['id' => $khachHang->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span></a> |
                <a href="{{ route('khach-hang.xoa', ['id' => $khachHang->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>
            </td>
        <tr>
            @endforeach
    </table>
</div>
@endsection