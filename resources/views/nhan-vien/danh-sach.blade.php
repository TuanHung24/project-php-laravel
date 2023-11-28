@extends('master')


@section('page-sw')
@if(session('thong_bao'))
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: "{{session('thong_bao')}}",
        showConfirmButton: true,
        timer: 10000
    })
</script>
@endif
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><span data-feather="list" ></span>DANH SÁCH NHÂN VIÊN</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('nhan-vien.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
        </div>
    </div>
</div>

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
        @foreach($dsNhanVien as $nhanVien)
        <tr>
            <td>{{ $nhanVien->id }}</td>
            <td>{{ $nhanVien->ho_ten }}</td>
            <td>{{ $nhanVien->dien_thoai }}</td>
            <td>{{ $nhanVien->email }}</td>
            <td>{{ $nhanVien->dia_chi }}</td>
            <td>{{ $nhanVien->username }}</td>
            <?php
            if ($nhanVien->trang_thai == 1) {
                $trang_thai = "Hoạt động";
            } else {
                $trang_thai = "Không hoạt động";
            }
            ?>
            <td>{{ $trang_thai }}</td>
            <td class="chuc-nang">
                <a href="{{ route('nhan-vien.cap-nhat', ['id' => $nhanVien->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span></a> |
                <a href="{{ route('nhan-vien.xoa', ['id' => $nhanVien->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>
            </td>
        <tr>
            @endforeach
    </table>
</div>
@endsection