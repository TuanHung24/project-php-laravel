<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            font-family: DejaVu Sans,sans-serif;
        }
        body{
            font-size: 13px;
        }
    </style>
</head>

<body>
    <h2>Hóa đơn nhập hàng</h2>
    <h3>Nhà cung cấp:{{$phieuNhap->nha_cung_cap->ten}} </h3>
    <h3>Mã hóa đơn:{{$phieuNhap->id}} </h3>
    <h3>Ngày tạo:{{$phieuNhap->ngay_nhap}}</h3>
    <div class="bd-example">
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá nhập</th>
                    <th>Giá bán</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dsCTPhieuNhap as $cthd)
                <tr>
                    <td>{{ $cthd->san_pham->ten }}</td>
                    <td>{{ $cthd->so_luong }}</td>
                    <td>{{ $cthd->gia_nhap }}</td>
                    <td>{{ $cthd->gia_ban }}</td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        <span>Thành tiền: {{ $phieuNhap->tong_tien }}</span>
    </div>
</body>
</html>