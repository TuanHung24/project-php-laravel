
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('bootstrap-5.2.3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('custom.css') }}" rel="stylesheet">
</head>
<body>
    <form method="POST" action="{{route('xl-dang-nhap')}}" class="login">
    @csrf
    <div class="mb-3">
    <label for="ten_dang_nhap" class="form-label">Username:</label>
    <input type="text" class="form-control" name="ten_dang_nhap" required>
    </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary" id="login">Đăng nhập</button>
</form>
</body>
