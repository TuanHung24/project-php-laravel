@extends('master')




@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6 class="h2"><span data-feather="list" ></span>DANH SÁCH SLIDESHOW</h6>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('slides.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới SLIDESHOW</a>
        </div>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('logo.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới LOGO</a>
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
                <th>Id</th>
                <th>Ảnh</th>
                <th>Tên tiêu đề</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        

        @foreach($dsSlide as $Slide)
        <tr>
            
            <td>{{ $Slide->id }}</td>
            <td>
                <img src="{{ $Slide->img_url}}" alt="ảnh" class="img_slide">
            <td>{{ $Slide->tieu_de }}</td>
            <td class="chuc-nang">
                <a href="{{ route('slides.cap-nhat', ['id' => $Slide->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span></a> |
                <a href="{{ route('slides.xoa', ['id' => $Slide->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>
            </td>
        <tr>
            @endforeach
        
    </table>


    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ảnh LOGO</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        

        @foreach($dsLogo as $Logo)
        <tr>
            
            <td>{{ $Logo->id }}</td>
            <td>
                <img src="{{ $Logo->img_url }}" alt="ảnh" class="img_logo">
            </td>
            <td class="chuc-nang">
                <a href="{{ route('logo.cap-nhat', ['id' => $Logo->id]) }}" class="btn btn-outline-primary"><span data-feather="edit"></span></a> |
                <a href="{{ route('logo.xoa', ['id' => $Logo->id]) }}" class="btn btn-outline-danger"><span data-feather="trash-2"></span></a>
            </td>
        <tr>
            @endforeach
        
    </table>
</div>
@endsection