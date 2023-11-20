<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
class KhachHangController extends Controller
{
    public function themMoi()
    {
        return view('khach-hang.them-moi');
    }

    public function xuLyThemMoi(Request $request)
    {
        $khachHang = new KhachHang();
        if($request->ho_ten!=null)
        {
            $khachHang->ho_ten          = $request->ho_ten;
            $khachHang->email           = $request->email;
            $khachHang->ten_dang_nhap   = $request->ten_dang_nhap;
            $khachHang->dien_thoai      = $request->dien_thoai;
            $khachHang->dia_chi         = $request->dia_chi;
            $khachHang->save();
            return redirect()->route('khach-hang.danh-sach')->with(['thong_bao'=>"Thêm khách hàng {$khachHang->ho_ten} thành công!"]);
        }
        return view('khach-hang.them-moi');
        
    }

    public function danhSach()
    {
        $dskhachHang=KhachHang::all();
        return view("khach-hang.danh-sach", compact('dskhachHang'));
    }

    public function capNhat($id)
    {
        
        $khachHang = KhachHang::find($id);
        if (empty($khachHang)) {
            return "Loại sản phẩm không tồn tại";
        }
        return view('khach-hang.cap-nhat', compact('khachHang'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $khachHang = KhachHang::find($id);
        if (empty($khachHang)) {
            return "Loại sản phẩm không tồn tại";
        }
        
        $khachHang->ho_ten          = $request->ho_ten;
        $khachHang->email           = $request->email;
        $khachHang->ten_dang_nhap   = $request->ten_dang_nhap;
        $khachHang->dien_thoai      = $request->dien_thoai;
        $khachHang->dia_chi         = $request->dia_chi;
        $khachHang->save();

        return redirect()->route('khach-hang.danh-sach')->with(['thong_bao'=>"Cập nhật  khách hàng {$khachHang->ho_ten} thành công!"]);
    }

    public function xoa($id)
    {
        $khachHang = KhachHang::find($id);
        if (empty($khachHang)) {
            return "Sản phẩm không tồn tại";
        }
        $khachHang->delete();
        return redirect()->route('khach-hang.danh-sach')->with(['thong_bao'=>"Xóa khách hàng {$khachHang->ho_ten} thành công!"]);
    }
}
