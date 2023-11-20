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
    <h1 class="h2">CHI TIẾT HÓA ĐƠN</h1>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
    <tr>
        <th>Mã hóa đơn</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
        <th>Trạng thái</th>
    </tr>
    </thead>
  @foreach($dsCTHoaDon as $cthoaDon)
    <tr>
        <td>{{ $cthoaDon->hoa_don_id }}</td>
        <td>{{ $cthoaDon->san_pham->ten }}</td>
        <td>{{ $cthoaDon->so_luong }}</td>
        <td>{{ $cthoaDon->don_gia }}</td>
        <td>{{ $cthoaDon->thanh_tien }}</td>
        <?php
        if($cthoaDon->trang_thai==true)
        {
            $trang_thai="Hoạt động";
        }
        else
        {
            $trang_thai="Không hoạt động";
        }
        ?>
        <td>{{ $trang_thai }}</td>
        
    <tr>
    @endforeach
</table>
@endsection
</div>