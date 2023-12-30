<?php

namespace App\Http\Controllers;

use App\Models\CTSanPham;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\PhieuNhap;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function danhSach()
    {
        $hoaDon=HoaDon::count();

        $tongTien = HoaDon::sum('tong_tien');
        $tongTienHoaDon = number_format($tongTien, 0, ',', '.');

        $khachHang=KhachHang::count();

        $soLuongSanPham=CTSanPham::sum('so_luong');
        
        $tongGiaNhap=PhieuNhap::sum('tong_tien');
        $tongTienGiaNhap = number_format($tongGiaNhap, 0, ',', '.');

        return view('thong-ke',compact('hoaDon','khachHang','soLuongSanPham','tongTienGiaNhap','tongTienHoaDon'));
    }
}
