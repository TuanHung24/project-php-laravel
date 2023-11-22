<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MauSac;
use App\Models\SanPham;

class MauSacController extends Controller
{
    
    public function danhSach(){
        $dsMauSac = mauSac::all();
        $dsSanPham = SanPham::all();
        return view("mau-dung-luong.danh-sach",compact('dsMauSac','dsSanPham'));
    }
    public function themMoi(){
        $dsSanPham = SanPham::all();
        return view("mau-dung-luong.them-moi",compact('dsSanPham'));
    }
    public function xlThemMoi(){
        $mauSac = new MauSac();
        $mauSac->san_pham_id = $request->san_pham_id;
        $mauSac->mau = $request->mau_sac;
        $sanPham->save();
    }
}
