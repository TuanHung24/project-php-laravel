@extends('master')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT SẢN PHẨM</h1>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Ảnh</th>
            </tr>
        </thead>
        @foreach($dsHinhAnh as $hinhAnh)
        <tr>
            <td>
                <img class="img" src="{{asset($hinhAnh->img_url)}}" alt="hinh_anh" />
            </td>
            <td class="td-xoa-anh">
                <a href="{{ route('hinh-anh', ['id' => $hinhAnh->id]) }}" class="btn btn-outline-danger">Xóa</a>

            </td>
        <tr>
            @endforeach
    </table>
</div>
<form class="row g-3" method="POST" action="{{ route('san-pham.xl-cap-nhat', ['id' => $sanPham->id]) }}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <label for="ten" class="form-label">Tên:</label>
            <input type="text" class="form-control" name="ten" value="{{$sanPham->ten}}" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="mo-ta" class="form-label">Mô tả:</label>
            <input type="text" class="form-control" name="mo_ta" value="{{$sanPham->mo_ta}}" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="gia_ban" class="form-label">Giá bán:</label>
            <input type="text" class="form-control" name="gia_ban" value="{{$sanPham->gia_ban}}" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="so-luong" class="form-label">Số lượng:</label>
            <input type="text" class="form-control" name="so_luong" value="{{$sanPham->so_luong}}" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="loai_san_pham" class="form-label">Loại sản phẩm:</label>
            <select name="loai_san_pham" class="form-select">
                <option type="text" class="form-control" name="loai_san_pham" value="{{$sanPham->loai_san_pham->id}}">
                    {{$sanPham->loai_san_pham->ten}}
                </option>
                @foreach($dsLoaiSanPham as $loaiSanPham)
                <option value="{{$loaiSanPham->id}}">
                    {{$loaiSanPham->ten}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="thong_tin" class="form-label">Thông tin:</label>
            <textarea type="textarea" class="form-control" id="thong-tin" name="thong_tin" rows="6" cols="50">{{$sanPham->thong_tin}}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="trang_thai" class="form-label">Trạng thái</label>
            <?php if($sanPham->trang_thai==1):?>
            <input type="checkbox" name="trang_thai" checked>
            <?php else:?>
            <input type="checkbox" name="trang_thai">
            <?php endif;?>
        </div>
    </div>
    <div class=row>
        <div class="col-md-6">
            <label for="hinh_anh[]" class="form-label">Thêm ảnh: </label>
            <input type="file" name="hinh_anh[]" multiple/>
        </div>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" class="Luu"><span data-feather="save"></span>Lưu</button>
    </div>

</form>

@endsection