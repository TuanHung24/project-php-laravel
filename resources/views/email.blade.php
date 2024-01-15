<div style="width:600px;margin:0px">
    <div>
        <h2>Xin chào {{$quanLy->name}}</h2>
        <p>Email này giúp bạn lấy lại mật khẩu </p>
        <p>Vui lòng click vào link dưới đây để đặt lại mật khẩu </p>
        <p>
            <a href="{{route('xl-lay-mat-khau',['customer'=>$quanLy->id, 'token'=>$quanLy->token])}}">
                Đặt lại mật khẩu
            </a>
        </p>
    </div>
</div>