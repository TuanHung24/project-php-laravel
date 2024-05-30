@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4><span data-feather="list" ></span>DANH SÁCH LOẠI SẢN PHẨM</h4>
    <form action="{{route('loai-san-pham.tim-kiem')}}" class="submit_search" id="search-form">
    @csrf
    <div class="Search">
        <input type="search" class="form-control form-control-dark" name="search_name" value="{{$reQuest ?? null}}" placeholder="Tên loại sản phẩm..." aria-label="Search" />
        <button class="btn btn-primary seach" type="submit"><span data-feather="search"></span></button>
    </div>
</form>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button onclick="toggleForm()" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</button>
        </div>
        <div class="btn-group me-2">
            <a href="{{ route('loai-san-pham.thung-rac') }}" class="btn btn-warning"><span data-feather="trash-2"></span>Thùng rác</a>
        </div>
    </div>
</div>


<form id="newForm" action="#" method="post" style="display:none;">
        @csrf
        <label for="name">Tên:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <button type="submit">Lưu</button>
        <button type="button" onclick="cancelForm()">Hủy</button>
</form>

@if(session('thong_bao'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div> 
              {{session('thong_bao')}}
        </div>
    </div>
@elseif(session('error'))
<div class="alert alert-danger d-flex align-items-center" role="alert">
        <div> 
              {{session('error')}}
        </div>
    </div>
@endif
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr class="title_lsp">
                <th id="th-id">Id</th>
                <th>Tên</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dsLoaiSanPham as $loaiSanPham)
        <tr>
            <td id="td-id">{{ $loaiSanPham->id }}</td>
            <td>{{ $loaiSanPham->ten }}</td>
            <td class="chuc-nang">
                <a href="{{ route('loai-san-pham.cap-nhat', ['id' => $loaiSanPham->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span></a> |
                <a href="{{ route('loai-san-pham.xoa', ['id' => $loaiSanPham->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>
            </td>
        <tr>
            @endforeach
    </table>
    @if(isset($errorMessage)) 
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
    @endif
</div>
{{ $dsLoaiSanPham->links('vendor.pagination.default') }}
<script>
        function toggleForm() {
            var form = document.getElementById("newForm");
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }

        function cancelForm() {
            var form = document.getElementById("newForm");
            form.style.display = "none";
        }
    </script>
@endsection

@section('page-js')
<script type="text/javascript">
    $(document).ready(function(){
        function toggleForm() {
            var form = document.getElementById("newForm");
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }

        function cancelForm() {
            var form = document.getElementById("newForm");
            form.style.display = "none";
        }
    });
</script>
@endsection