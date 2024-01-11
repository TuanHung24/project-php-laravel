<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Hash;

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
        $khachHang->ho_ten=$request->ho_ten;
        $khachHang->email=$request->email;
        $khachHang->ten_dang_nhap=$request->ten_dang_nhap;
        $khachHang->password=Hash::make($request->mat_khau);
        $khachHang->dien_thoai=$request->so_dien_thoai;
        $khachHang->save();
        return response()->json([
            'success'=>true,
            'message'=>'Đăng ký tài khoản thành công'
        ]);
    }
}
