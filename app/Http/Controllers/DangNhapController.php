<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NhanVien;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;

class DangNhapController extends Controller
{
    public function dangNhap()
    {
        return view('dang-nhap');
    }
    public function xuLyDangNhap(Request $rq)
    {
        $remember = $rq->has('remember');
        if(Auth::attempt(['username'=> $rq->ten_dang_nhap,'password'=>$rq->password,'trang_thai'=>true],$remember))
        {   
            return redirect()->route('san-pham.danh-sach')->with(['dang_nhap'=>"Đăng nhập thành công!"]);
        }
        return view('dang-nhap')->with(['error' => 'Đăng nhập không thành công']);
            
    }
    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('dang-nhap');
    }
    public function thongTin()
    {
        if(Auth::check())
        { 
            return view('thong-tin');
        }
        return view('dang-nhap');
    }
    public function capNhatThongTin(Request $request)
    {
        
        $nhanVien=NhanVien::find(Auth::user()->id);
        if(isset($request->avatar))
        {
            $file=$request->avatar;
            $path=$file->store('avt');
            $nhanVien->avatar_url=$path;
        }
        $nhanVien->username=$request->username;
        $nhanVien->ho_ten=$request->ho_ten;
        $nhanVien->email=$request->email;
        $nhanVien->dien_thoai=$request->dien_thoai;
        $nhanVien->dia_chi=$request->dia_chi;
        $nhanVien->save();
        return redirect()->route('thong-tin')->with(['thong_bao'=>"Cập nhật thông tin thành công!"]);

    }
    public function DoiMatKhau(){
        return view("admin.doi-mat-khau");
    }
    public function xlDoiMatKhau(Request $rq){
        if (!Hash::check($rq->password, Auth::user()->password)) {
            return redirect()->route("doi-mat-khau")->with(['error' => 'Mật khẩu cũ không đúng!']);
        }
        $taiKhoan=NhanVien::find(Auth::user()->id);
        $taiKhoan->password=Hash::make($rq->respassword);
        $taiKhoan->save();
        return redirect()->route('thong-tin')->with(['thong_bao'=>"Thay đổi mật khẩu thành công!"]);
    }
}