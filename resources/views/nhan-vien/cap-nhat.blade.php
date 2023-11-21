@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT NHÂN VIÊN</h1>
</div>
<form class="row g-3" method="POST" id="update" action="{{ route('nhan-vien.xl-cap-nhat', ['id' => $nhanVien->id]) }}" enctype="multipart/form-data">
   @csrf
   <div class="row">
        <div class="col-md-6">
            <label for="ho_ten" class="form-label">Họ tên:</label>
            <input type="text" class="form-control" name="ho_ten" id="ho_ten" value="{{$nhanVien->ho_ten}}">
            <span id="ho_ten_error" class="error-message"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="dien_thoai" class="form-label">Điện thoại:</label>
            <input type="text" class="form-control" name="dien_thoai" id="dien-thoai" value="{{$nhanVien->dien_thoai}}">
            <span id="dien_thoai_error" class="error-message"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$nhanVien->email}}">
            <span id="email_error" class="error-message"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="dia_chi" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" name="dia_chi" value="{{$nhanVien->dia_chi}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="username" class="form-label">Tên tài khoản:</label>
            <input type="text" class="form-control" name="username" id="username" value="{{$nhanVien->username}}">
            <span id="username_error" class="error-message"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="password" class="form-label">Mật khẩu:</label>
            <input type="password" class="form-control" name="password" value="{{$nhanVien->password}}" readonly>
        </div>
    </div>
    <div class=row>
    <div class="col-md-6">
        <label for="hinh_anh" class="form-label">Chọn ảnh đại diện:</label>
        <input type="file" name="hinh_anh"/>
    </div>
</div>
    <div class="row">
    <div class="col-md-6">
        <label for="trang_thai" class="form-label">Trạng thái</label>
        <?php if($nhanVien->trang_thai==1):?>
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

@section('page-js')
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#update').submit(function(e)
        {
            var dienThoai=$('#dien-thoai').val();
            var dienThoaiError = $('#dien_thoai_error');
            var hoTen=$('#ho_ten').val();
            var hoTenError=$('#ho_ten_error');
            var Username=$('#username').val();
            var UsernameError=$('#username_error');
            if(dienThoai.length!==10 || isNaN(dienThoai))
            {
                e.preventDefault();
                $('#dien_thoai_error').text('Số điện thoại phải có 10 số!');
            }
            else{
                $('#dien_thoai_error').text('');
            }

           
            if(hoTen.length<=10 && hoTen.length<=40)
            {
                e.preventDefault();
                $('#ho_ten_error').text('Họ tên phải lớn hơn 10 và bé hơn 40 ký tự!');
            }
            else if(/\d/.test(hoTen)){
                e.preventDefault();
                $('#ho_ten_error').text('Họ tên không được có ký tự số!')
            }
            else{
                $('#ho_ten_error').text('');
            }

            if(Username.length<8)
            {
                e.preventDefault();
                $('#username_error').text('Tên tài khoản phải lớn hơn 7 ký tự')
            }
            else if(/^\d/.test(Username)){
                e.preventDefault();
                $('#username_error').text('Tên tài khoản không được có ký tự số ở đầu');
            }
            else{
                $('#username_error').text('');
            }
        })
    })
</script>
@endsection