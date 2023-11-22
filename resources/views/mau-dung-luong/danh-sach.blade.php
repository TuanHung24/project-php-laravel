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
    <h4 class=""><span data-feather="list" ></span>Danh Sách Màu Sắc Và Dung Lượng</h4>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('mau-dung-luong.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
    <tr>
        <th>Tên sản phẩm</th>
        <th>Màu sắc</th>
        <th>Dung lượng</th>
    </thead> 
    @foreach($dsSanPham as $sanPham)
    <tr> 
        <td>{{ $sanPham->ten }}</td> 
        <td class="chuc-nang">
           
        </td>
    <tr>
    @endforeach
</table>
@endsection
</div>