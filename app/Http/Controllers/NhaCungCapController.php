<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;
use App\http\Requests\NhaCungCapRequest;
class NhaCungCapController extends Controller
{
    public function themMoi()
    {
        return view('nha-cung-cap.them-moi');
    }

    public function xuLyThemMoi(NhaCungCapRequest $request)
    {
        $nhaCungCap = new NhaCungCap();
        if($request->ten!=null)
        {
            $nhaCungCap->ten          = $request->ten;
            $nhaCungCap->dien_thoai      = $request->dien_thoai;
            $nhaCungCap->dia_chi         = $request->dia_chi;
            $nhaCungCap->trang_thai      = 1;
            $nhaCungCap->save();
            return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao'=>"Thêm nhà cung cấp {$nhaCungCap->ten} thành công!"]);
        }
        return view('nha-cung-cap.them-moi');
        
    }

    public function danhSach()
    {
        $dsnhaCungCap = NhaCungCap::all();
        return view("nha-cung-cap.danh-sach", compact('dsnhaCungCap'));
    }

    public function capNhat($id)
    {
        
        $nhaCungCap = NhaCungCap::find($id);
        if (empty($nhaCungCap)) {
            return "Nhà cung cấp không tồn tại";
        }
        return view('nha-cung-cap.cap-nhat', compact('nhaCungCap'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $nhaCungCap = NhaCungCap::find($id);
        if (empty($nhaCungCap)) {
            return "Nhà cung cấp không tồn tại";
        }
        
        $nhaCungCap->ten          = $request->ten;
        $nhaCungCap->dien_thoai      = $request->dien_thoai;
        $nhaCungCap->dia_chi         = $request->dia_chi;
        if(isset($request->trang_thai))
        {
            $nhaCungCap->trang_thai=1;
        }
        else
        {
            $nhaCungCap->trang_thai=0;
        }
        $nhaCungCap->save();

        return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao'=>"Cập nhật nhà cung cấp {$nhaCungCap->ten} thành công!"]);
    }

    public function xoa($id)
    {
        $nhaCungCap = NhaCungCap::find($id);
        if (empty($nhaCungCap)) {
            return "Nhà cung cấp không tồn tại";
        }
        $nhaCungCap->trang_thai=0;
        $nhaCungCap->save();
        return redirect()->route('nha-cung-cap.danh-sach')->with(['thong_bao'=>"Xóa nhà cung cấp {$nhaCungCap->ten} thành công!"]);
    }
}
