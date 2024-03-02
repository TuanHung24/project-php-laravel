@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>Danh sách đơn hàng của: <span style="color:red">{{$khachHang->ho_ten}}</span></h4>
</div>
    <div class="table-responsive">
    @if(@isset($dsHoaDon) && count($dsHoaDon) >0)
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tổng tiền</th>
                
                <th>Phương thức thanh toán</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dsHoaDon as $hoaDon)
        <tr>
            <td>{{ $hoaDon->id}}</td>
            <td>{{ $hoaDon->tong_tien }}</td>
           
            <td>{{ $hoaDon->phuong_thuc_tt }}</td>
            <td>{{ $hoaDon->ngay_tao }}</td>
            <td>
                <a href="#" class="xem-chi-tiet" data-id="{{ $hoaDon->id }}">Xem chi tiết</a>
            </td>
        <tr>
            @endforeach
    </table>
    @else
     <span class="kh-co-hd">Chưa có đơn hàng nào!</span>
    @endif
    @if(isset($errorMessage))
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
    @endif
    
</div>
</div>
@endsection

@section('page-js')
<script type="text/javascript">
    $(document).ready(function() {
        $('.xem-chi-tiet').click(function(e){
            e.preventDefault();
            var id = $(this).data('id');
            
            $.ajax({
                method: 'POST',
                url: "{{ route('don-hang-chi-tiet-ajax') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(response){
                    // Hiển thị thông tin chi tiết của hóa đơn trong modal hoặc bất kỳ phần nào khác của trang
                    console.log(response);
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                }
            });
        });
    })
</script>

@endsection