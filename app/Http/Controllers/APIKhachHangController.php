<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
class APIKhachHangController extends Controller
{
    public function dangKy(Request $request)
    {
        $taiKhoan=KhachHang::where('ten_dang_nhap',$request->ten_dang_nhap)->first();
        if(!empty($taiKhoan))
        {
            return response()->json([
                'success'=>false,
                'message'=>'Tên đăng nhập đã tồn tại'
            ]);
        }
        $khachHang=new KhachHang();
        $khachHang->ten_dang_nhap=$request->ten_dang_nhap;
        $khachHang->mat_khau=$request->mat_khau;
        $khachHang->save();
        return response()->json([
            'success'=>true,
            'message'=>'Đăng ký tài khoản thành công'
        ]);
    }
}
