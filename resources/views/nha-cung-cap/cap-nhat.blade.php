@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT NHÀ CUNG CẤP</h1>
</div>
<form class="container" method="POST" action="{{ route('nha-cung-cap.xl-cap-nhat', ['id' => $nhaCungCap->id]) }}">
   @csrf
   <div class="row">
        <div class="col-md-6">
            <label for="ten" class="form-label">Tên:</label>
            <input type="text" class="form-control" name="ten" value="{{$nhaCungCap->ten}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="dien_thoai" class="form-label">Điện thoại:</label>
            <input type="text" class="form-control" name="dien_thoai" value="{{$nhaCungCap->dien_thoai}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="dia_chi" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" name="dia_chi" value="{{$nhaCungCap->dia_chi}}">
        </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <label for="trang_thai" class="form-label">Trạng thái</label>
        <?php if($nhaCungCap->trang_thai==1):?>
        <input type="checkbox" name="trang_thai" checked>
        <?php else:?>
        <input type="checkbox" name="trang_thai">
        <?php endif;?>
    </div>
</div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" class="Luu"><span data-feather="save"></span>Lưu</button>
    </div>
</form>
@endsection