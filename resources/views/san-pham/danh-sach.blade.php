@extends('master')

@section('page-sw')
@if(session('dang_nhap'))
<script>
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: "{{session('dang_nhap')}}",
        showConfirmButton: true,
        timer: 3000
        })
    </script>
@endif
@endsection

@section('content')
<form action="{{route('san-pham.tim-kiem')}}" class="submit_search" id="search-form">
    <label class="label_title">Nhập tên sản phẩm:</label>
    <div class="Search">
        <input type="search" class="form-control form-control-dark" name="search_name" value="{{$reQuest ?? null}}" placeholder="Tìm kiếm..." aria-label="Search" />
        <button class="btn btn-primary seach" type="submit"><span data-feather="search"></span></button>
    </div>
</form>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4><span data-feather="list" ></span>DANH SÁCH SẢN PHẨM</h4>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('san-pham.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
        </div>
    </div>
</div>
@if(session('thong_bao'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div> 
              {{session('thong_bao')}}
        </div>
    </div>
@endif

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
    <tr>
        <th>Id</td>
        <th>Tên</th>
        <th>Mô tả</th>  
        <th>Loại sản phẩm</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @foreach($dsSanPham as $sanPham)
    <tr>
        <td>{{ $sanPham->id }}</td>
        <td>{{ $sanPham->ten }}</td>
        <td>{{ $sanPham->mo_ta }}</td>
        <td>{{ $sanPham->loai_san_pham->ten }}</td>
        <td class="chuc-nang">
            <a href="{{ route('san-pham.chi-tiet', ['id' => $sanPham->id]) }}" class="btn btn-outline-info"><span data-feather="chevrons-right"></span></a> |
            <a href="{{ route('san-pham.cap-nhat', ['id' => $sanPham->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span></a> |
            <a href="{{ route('san-pham.xoa', ['id' => $sanPham->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>
        </td>
    <tr>
    @endforeach
    </tbody>
</table>
@if(session('null_tk'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div> 
              {{session('null_tk')}}
        </div>
    </div>
@endif
</div>
@endsection
<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('#search-form').submit(function(e) {
           
            e.preventDefault();

            
            var searchValue = $('search_name]').val();

           
            if (searchValue.trim() !== '') {
                console.log('Searching for: ' + searchValue);
            }
        });
    })
</script>
@section('page-js')

@endsection -->