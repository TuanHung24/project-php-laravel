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
    <h1 class="h2"><span data-feather="list" ></span>DANH SÁCH BÌNH LUẬN</h1>
     <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('binh-luan.danh-sach') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Trả lời bình luận</a>
        </div>
    </div>
    
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Mã bình luận</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Nội dung</th>
            </tr>
        </thead>
        @foreach($dsBinhLuan as $binhLuan)
        <tr>
            
            <td>{{ $binhLuan->khach_hang_id}}</td>
            <td>{{ $binhLuan->san_pham_id}}</td>
            <td>{{ $binhLuan->noi_dung }}</td>
            <td>{{ $binhLuan->ngay_tao }}</td>
            <td class="chuc-nang">
                <a href="{{ route('binh-luan.chi-tiet', ['id' => $binhLuan->id]) }}" class="btn btn-outline-info"><span data-feather="chevrons-right"></span></a>|
                <a href="{{ route('binh-luan.xoa', ['id' => $binhLuan->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>|
            </td>
        <tr>
            @endforeach
    </table>
</div>
@endsection