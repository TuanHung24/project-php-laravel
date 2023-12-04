<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\Models\BinhLuan;
use App\Models\SanPham;

class BinhLuanController extends Controller
{
    public function danhSach(){
        $dsBinhLuan=BinhLuan::all();
        return view("binh-luan.danh-sach" , compact('dsBinhLuan'));
    }
    public function chiTiet($id){
        $binhLuan=Binhluan::find($id);
        if(empty($dsBinhLuan))
        {
            return "Bình luận không tồn tại";
        }
        return view("binh-luan.chi-tiet",compact('binhLuan'));
    }
    public function traLoiBinhLuan($id)
    {
            
    }
    public function xoa($id){
        $binhLuan=Binhluan::find($id);
        if(empty($dsBinhLuan))
        {
            return "Bình luận không tồn tại";
        }
        $binhLuan->delete();
        $dsBinhLuan=BinhLuan::all();
        return redirect()->route('binh-luan.danh-sach',compact('dsBinhLuan'))->with(['thong_bao'=>"Xóa bình luận {$binhLuan->noi_dung} thành công!"]);;

    }
    
}
