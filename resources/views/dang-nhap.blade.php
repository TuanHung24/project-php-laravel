
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('bootstrap-5.2.3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/core.min.css' )}}" rel="stylesheet">
</head>
<body>
<form method="POST" action="{{ route('xl-dang-nhap') }}" class="login"> 
  @csrf
<div class="d-flex align-items-center mb-3 pb-1">
  
  <span class="h1 fw-bold mb-0">Logo</span>
</div>

<h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập tài khoản</h5>

<div class="form-outline mb-4">
  <label class="form-label" for="form2Example17">Tên tài khoản:</label>
  <input type="text" id="form2Example17" name="ten_dang_nhap" class="form-control form-control-lg">
  
</div>

<div class="form-outline mb-4">
<label class="form-label" for="form2Example27">Mật khẩu:</label>
  <input type="password" id="form2Example27"name="password" class="form-control form-control-lg">
  
</div>

<div class="pt-1 mb-4">
  <button class="btn btn-dark btn-lg btn-block" type="submit">Đăng nhập</button>
</div>

<a class="small text-muted" href="#!">Forgot password?</a>
</form>
</body>
