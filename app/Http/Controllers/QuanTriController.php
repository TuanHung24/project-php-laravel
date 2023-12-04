<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuanTri;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use LengthException;

class QuanTriController extends Controller
{
    public function themMoi()
    {
        return view("nhan-vien.them-moi");
    }
    public function xuLyThemMoi(Request $request)
    {
        $quanTri = new QuanTri();
        if($request->ho_ten!=null)
        {
            $file=$request->hinh_anh;
            $path=$file->store('avt');
            $quanTri->avatar_url       = $path;
            $quanTri->ho_ten           = $request->ho_ten;
            $quanTri->email            = $request->email;
            $quanTri->dien_thoai       = $request->dien_thoai;
            $quanTri->dia_chi          = $request->dia_chi;
            $quanTri->username         = $request->username;
            $quanTri->password         = Hash::make($request->password);
            $quanTri->save();
            return redirect()->route('nhan-vien.danh-sach')->with(['thong_bao'=>"Thêm nhân viên {$quanTri->ho_ten} thành công!"]);
        }
        return view('nhan-vien.them-moi');
        
    }
    public function danhSach()
    {
        $dsQuanTri = QuanTri::all();
        return view("nhan-vien.danh-sach", compact('dsQuanTri'));
    }

    public function capNhat($id)
    {
        
        $quanTri = QuanTri::find($id);
        if (empty($quanTri)) {
            return "Loại sản phẩm không tồn tại";
        }
        return view('nhan-vien.cap-nhat', compact('quanTri'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $quanTri = QuanTri::find($id);
        if (empty($quanTri)) {
            return "Nhân viên không tồn tại";
        }
        $file                       = $request->hinh_anh;
        if(isset($file))
        {
            $paths                       = $file->store('avt');
            $quanTri->avatar_url       = $paths;
        }
        $quanTri->ho_ten           = $request->ho_ten;
        $quanTri->dien_thoai       = $request->dien_thoai;
        $quanTri->dia_chi          = $request->dia_chi;
        $quanTri->email            = $request->email;
        $quanTri->username         = $request->username;
        $quanTri->password         = $request->password;
        if(isset($request->trang_thai))
        {
            $quanTri->trang_thai=1;
        }
        else
        {
            $quanTri->trang_thai=0;
        }
        $quanTri->save();      

        return redirect()->route('nhan-vien.danh-sach')->with(['thong_bao'=>"Cập nhật nhân viên {$quanTri->ho_ten} thành công!"]);
    }
    public function xoa($id)
    {
        $quanTri = QuanTri::find($id);
        if (empty($quanTri)) {
            return "nhân viên không tồn tại";
        }
        $quanTri->trang_thai=0;
        $quanTri->save();
        return redirect()->route('nhan-vien.danh-sach')->with(['thong_bao'=>"Xóa nhân viên {$quanTri->ten} thành công!"]);
    }
}