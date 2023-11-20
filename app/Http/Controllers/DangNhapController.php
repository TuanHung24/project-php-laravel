<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NhanVien;
class DangNhapController extends Controller
{
    public function dangNhap()
    {
        return view('dang-nhap');
    }
    public function xuLyDangNhap(Request $rq)
    {
        if(Auth::attempt(['username'=> $rq->ten_dang_nhap,'password'=>$rq->password,'trang_thai'=>true]))
        {   
            return redirect()->route('san-pham.danh-sach')->with(['thong_bao'=>"Đăng nhập thành công!"]);
        }
        return view('dang-nhap');
            
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
}
