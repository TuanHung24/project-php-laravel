@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI NHÂN VIÊN</h1>
</div>
<form method="POST" action="{{ route('nhan-vien.xl-them-moi') }}" id="add">
@csrf
<div class="row">
    <div class="col-md-6">
        <label for="ho_ten" class="form-label">Họ tên:</label>
        <input type="text" class="form-control" name="ho_ten" id="ho-ten">
        <span id="ho_ten_error" class="error-message"></span>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="dien_thoai" class="form-label">Điện thoại:</label>
        <input type="text" class="form-control" name="dien_thoai" id='dien-thoai'>
        <span id="dien_thoai_error" class="error-message"></span>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="dia_chi" class="form-label">Địa chỉ:</label>
        <input type="text" class="form-control" name="dia_chi">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="username" class="form-label">Tên tài khoản:</label>
        <input type="text" class="form-control" name="username" id="username">
        <span id="username_error" class="error-message"></span>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="password" class="form-label">Mật khẩu:</label>
        <input type="password" class="form-control" name="password" id="password">
        <span id="password_error" class="error-message"></span>
    </div>
</div>
<div class="col-md-2">
    <button type="submit" class="btn btn-primary"><span data-feather="save"></span>Lưu</button>
  </div>
</form>
@endsection

@section('page-js')
<script type="text/javascript">
    $(document).ready(function(){

        $('#add').submit(function(e)
        {
            var hoTen=$('#ho-ten').val();
            var dienThoai=$('#dien-thoai').val();
            var Username=$('#username').val();
            var Password=$('#password').val();

            if(hoTen.length <=10 || hoTen.length>=40 || isNaN(hoTen))
            {
                e.preventDefault();
                $('#ho_ten_error').text("Họ tên phải lớn hơn 10 ký tự và bé hơn 40 ký tự!")
            }
            else if( /\d/.test(hoTen)){
                e.preventDefault();
                $('#ho_ten_error').text("Họ tên họ tên không được có ký tự số!")
            }
            else{
                $('#ho_ten_error').text('')
            }

            if(dienThoai.length !==10 || isNaN(dienThoai))
            {
                e.preventDefault();
                $('#dien_thoai_error').text('Số điện thoại phải có 10 số!')
            }
            else{
                $('#dien_thoai_error').text('');
            }

           

            if(Username.length<8)
            {
                e.preventDefault();
                $('#username_error').text('Tên tài khoản không được dưới 8 ký tự!')
            }
            else if(/^\d/.test(Username)){
                e.preventDefault();
                $('#username_error').text('Tên tài khoản không được có ký tự số ở đầu!')
            }
            else{
                $('#username_error').text('');
            }

            if(Password.length<6){
                e.preventDefault()
                $('#password_error').text('Mật khẩu không được dưới 6 ký tự!')
            }
            else{
                $('#password_error').text('')
            }
        })
    })
</script>
@endsection