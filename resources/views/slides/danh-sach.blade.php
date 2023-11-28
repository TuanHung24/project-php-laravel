@extends('master')


@section('page-sw')
@if(session('thong_bao'))
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: "{{session('thong_bao')}}",
        showConfirmButton: true,
        timer: 10000
    })
</script>
@endif
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><span data-feather="list" ></span>DANH SÁCH SLIDE</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('slides.them-moi') }}" class="btn btn-success"><span data-feather="plus-circle"></span>Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên tiêu đề</th>
                <th>Ảnh tiêu đề</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        @foreach($dsSlide as $Slide)
        <tr>
            <td>{{ $Slide->id }}</td>
            <td>{{ $Slide->tieu_de }}</td>
            
            <td class="chuc-nang">
               
            </td>
        <tr>
            @endforeach
    </table>
</div>
@endsection