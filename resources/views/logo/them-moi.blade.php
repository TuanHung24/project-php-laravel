@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4>THÊM MỚI LOGO</h4>
</div>
<form method="POST" action="{{ route('logo.xl-them-moi') }}" class="container" id="add" enctype="multipart/form-data">
@csrf

<div class=row>
    <div class="col-md-6">
    <label for="hinh-anh" class="form-label">Chọn ảnh LOGO: </label>
    <input type="file" name="hinh_anh" value="{{old('hinh_anh')}}" required/><br/>
    </div>
</div>
<div class="col-md-2">
    <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection