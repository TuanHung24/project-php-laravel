<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\HinhAnh;
class HinhAnhController extends Controller
{
    
    public function hinhAnhXoa($id)
    {
        $hinhAnh=HinhAnh::find($id);
        if(!empty($hinhAnh->ten))
        {
            $imgPath=$hinhAnh->ten;
            if (file_exists(public_path($imgPath))) {
            unlink(public_path($imgPath));
        }
        }
        if(empty($hinhAnh)){
            return redirect()->route("san-pham.danh-sach")->with(['thong_bao'=>"Xóa ảnh thành công!"]);
        }
        $hinhAnh->delete();
       
        return redirect()->route("san-pham.danh-sach")->with(['thong_bao'=>"Xóa ảnh thành công!"]);
    }
    
}
