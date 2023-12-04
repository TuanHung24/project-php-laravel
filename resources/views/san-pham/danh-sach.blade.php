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
    <h1 class="h2"><span data-feather="list" ></span>DANH SÁCH SẢN PHẨM</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('san-pham.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
    <tr>
        <th>Id</td>
        <th>Tên</th>
        <th>Mô tả</th>  
        <th>Loại sản phẩm</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
    </tr>
    </thead> 
    @foreach($dsSanPham as $sanPham)
    <tr>
        <td>{{ $sanPham->id }}</td>
        <td>{{ $sanPham->ten }}</td>
        <td>{{ $sanPham->mo_ta }}</td>
        <td>{{ $sanPham->loai_san_pham->ten }}</td>
        <?php
        if($sanPham->trang_thai==1)
        {
            $trang_thai="Hoạt động";
        }
        else
        {
            $trang_thai="Không hoạt động";
        }
        ?>
        <td>{{$trang_thai}}</td>
        
        <td class="chuc-nang">
            <a href="{{ route('san-pham.chi-tiet', ['id' => $sanPham->id]) }}" class="btn btn-outline-info"><span data-feather="chevrons-right"></span></a> |
            <a href="{{ route('san-pham.cap-nhat', ['id' => $sanPham->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span></a> |
            <a href="{{ route('san-pham.xoa', ['id' => $sanPham->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>
        </td>
    <tr>
    @endforeach
</table>
</div>
@endsection