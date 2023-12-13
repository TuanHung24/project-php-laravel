<?php

namespace App\Http\Controllers;

use App\Models\CTSanPham;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function danhSach()
    {
        $hoaDon=HoaDon::count();
        $khachHang=KhachHang::count();
        $soLuongSanPham=CTSanPham::sum('so_luong');
        return view('thong-ke',compact('hoaDon','khachHang','soLuongSanPham'));
    }
}
