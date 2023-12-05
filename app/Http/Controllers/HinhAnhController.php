<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\HinhAnh;
use App\Models\LoaiSanPham;
use App\Models\ThongTinSanPham;

class HinhAnhController extends Controller
{
    
    public function hinhAnhXoa($id)
    {

        $hinhAnh=HinhAnh::find($id);
        if(!empty($hinhAnh->img_url))
        {
            $imgPath=$hinhAnh->img_url;
            if (file_exists(public_path($imgPath))) {
            unlink(public_path($imgPath));
            $hinhAnh->delete();
        }
        }
        if(empty($hinhAnh)){
            return redirect()->route("san-pham.danh-sach")->with(['thong_bao'=>"Xóa ảnh thành công!"]);
        }
        return redirect()->route("san-pham.danh-sach")->with(['thong_bao'=>"Xóa ảnh thành công!"]);
    
    }
    
}
