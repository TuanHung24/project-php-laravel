
@extends('master')

@section('content')
<body>
    <form method="POST" action="{{route('xl-doi-mat-khau')}}" class="login">
        @csrf
  <div class="mb-3">
    <label for="password" class="form-label">Mật Khẩu:</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  <div class="mb-3">
    <label for="respassword" class="form-label">Nhập mật khẩu mới:</label>
    <input type="respassword" class="form-control" name="respassword" required>
  </div>
  <button type="submit" class="btn btn-primary" >Lưu</button>
</form>
</body>
@endsection