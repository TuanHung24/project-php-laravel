@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI SLIDE</h1>
</div>
<form method="POST" action="{{ route('slides.xl-them-moi') }}" class="container" id="add" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-md-6">
        <label for="tieu_de" class="form-label">Tên tiêu đề:</label>
        <input type="text" class="form-control" name="tieu_de" id="tieu-de">
        <span id="tieu_de_error" class="error-message"></span>
    </div>
</div>

<div class=row>
    <div class="col-md-6">
        <label for="hinh_anh" class="form-label">Chọn ảnh slide:</label>
        <input type="file" name="hinh_anh"/>
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
            var tieuDe=$('#tieu-de').val();
            if(tieuDe.length <=10 || tieuDe.length>=40)
            {
                e.preventDefault();
                $('#tieu_de_error').text("Tiêu đề phải lớn hơn 10 ký tự và bé hơn 40 ký tự!")
            }
            else{
                $('#tieu_de_error').text('')
            }
        })
    })
</script>
@endsection