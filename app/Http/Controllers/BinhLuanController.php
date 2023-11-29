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
        $dsBinhLuan=BinhLuan::where('khach_hang_id',$id)->get();
        if(empty($dsBinhLuan))
        {
            return "Bình luận không tồn tại";
        }
        return view("binh-luan.chi-tiet",compact('dsBinhLuan'));
    }
    public function xoa($id){
        $dsBinhLuan=BinhLuan::where('khach_hang_id',$id)->get();

        $dsBinhLuan=Binhluan::find($id);
        if(empty($dsBinhLuan))
        {
            return "Bình luận không tồn tại";
        }
        $dsBinhLuan=BinhLuan::all();
        return redirect()->route('binh-luan.danh-sach',compact('dsBinhLuan'))->with(['thong_bao'=>"Xóa binh luan thành công!"]);;

    }
    
}
