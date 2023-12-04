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
    
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Mã bình luận</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Nội dung</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        @foreach($dsBinhLuan as $binhLuan)
        <tr>
            
            <td>{{ $binhLuan->id}}</td>
            <td>{{ $binhLuan->khach_hang->ho_ten}}</td>
            <td>{{ $binhLuan->san_pham->ten}}</td>
            <td>{{ $binhLuan->noi_dung }}</td>
            <td>{{  $binhLuan->ngay_tao}}</td>
            <td class="chuc-nang">
                <a href="{{ route('binh-luan.tra-loi', ['id' => $binhLuan->id]) }}" class="btn btn-outline-info"><span data-feather="message-circle"></span>Trả lời</a>|
                <a href="{{ route('binh-luan.xoa', ['id' => $binhLuan->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>|
            </td>
        <tr>
            @endforeach
    </table>
</div>
@endsection