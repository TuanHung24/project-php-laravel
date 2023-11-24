<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use LengthException;

class NhanVienController extends Controller
{
    public function themMoi()
    {
        return view("nhan-vien.them-moi");
    }
    public function xuLyThemMoi(Request $request)
    {
        $nhanVien = new NhanVien();
        if($request->ho_ten!=null)
        {
            $file=$request->hinh_anh;
            $path=$file->store('avt');
            $nhanVien->avatar_url       = $path;
            $nhanVien->ho_ten           = $request->ho_ten;
            $nhanVien->email            = $request->email;
            $nhanVien->dien_thoai       = $request->dien_thoai;
            $nhanVien->dia_chi          = $request->dia_chi;
            $nhanVien->username         = $request->username;
            $nhanVien->password         = Hash::make($request->password);
            $nhanVien->save();
            return redirect()->route('nhan-vien.danh-sach')->with(['thong_bao'=>"Thêm nhân viên {$nhanVien->ho_ten} thành công!"]);
        }
        return view('nhan-vien.them-moi');
        
    }
    public function danhSach()
    {
        $dsNhanVien = NhanVien::all();
        return view("nhan-vien.danh-sach", compact('dsNhanVien'));
    }

    public function capNhat($id)
    {
        
        $nhanVien = NhanVien::find($id);
        if (empty($nhanVien)) {
            return "Loại sản phẩm không tồn tại";
        }
        return view('nhan-vien.cap-nhat', compact('nhanVien'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $nhanVien = NhanVien::find($id);
        if (empty($nhanVien)) {
            return "Nhân viên không tồn tại";
        }
        $file                       = $request->hinh_anh;
        if(isset($file))
        {
            $paths                       = $file->store('avt');
            $nhanVien->avatar_url       = $paths;
        }
        $nhanVien->ho_ten           = $request->ho_ten;
        $nhanVien->dien_thoai       = $request->dien_thoai;
        $nhanVien->dia_chi          = $request->dia_chi;
        $nhanVien->email            = $request->email;
        $nhanVien->username         = $request->username;
        $nhanVien->password         = $request->password;
        if(isset($request->trang_thai))
        {
            $nhanVien->trang_thai=1;
        }
        else
        {
            $nhanVien->trang_thai=0;
        }
        $nhanVien->save();      

        return redirect()->route('nhan-vien.danh-sach')->with(['thong_bao'=>"Cập nhật nhân viên {$nhanVien->ho_ten} thành công!"]);
    }

    public function xoa($id)
    {
        $nhanVien = NhanVien::find($id);
        if (empty($nhanVien)) {
            return "nhân viên không tồn tại";
        }
        $nhanVien->trang_thai=0;
        $nhanVien->save();
        return redirect()->route('nhan-vien.danh-sach')->with(['thong_bao'=>"Xóa nhân viên {$nhanVien->ten} thành công!"]);
    }
}
