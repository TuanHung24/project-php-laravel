<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <style>
        *{
            font-family: DejaVu Sans,sans-serif;
        }
        body{
            font-size: 13px;
        }
    </style>
<body>
    <h2>Hóa đơn bán hàng</h2>
    <h4>Nhân viên:{{$hoaDon->nhan_vien->ho_ten}} </h4>
    <h4>Tên khách hàng:{{$hoaDon->khach_hang}} </h4>
    <h4>Mã hóa đơn:{{$hoaDon->id}} </h4>
    <h4>Ngày tạo:{{$hoaDon->ngay_tao}} </h4>
    <div class="bd-example">
        <table class="table" border="1" style="width:60%;margin:2% 2% 2% 0;text-align:center">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dsCTHoaDon as $cthd)
                <tr>
                    <td>{{ $cthd->san_pham->ten }}</td>
                    <td>{{ $cthd->so_luong }}</td>
                    <td>{{ $cthd->don_gia }}</td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        <span>Thành tiền: {{ $hoaDon->tong_tien }} VND</span>
    </div>
</body>
</html>