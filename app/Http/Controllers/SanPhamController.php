<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;
class SanPhamController extends Controller
{
    public function themMoi()
    {
        $dsLoaiSanPham=LoaiSanPham::all();
        return view('san-pham.them-moi',compact('dsLoaiSanPham'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $files=$request->hinh_anh;
        $paths=[];
        
        foreach($files as $file)
        {
            $paths[]=$file -> store('uploads');
           
        }     
        $sanPham = new SanPham();
        $sanPham->ten               = $request->ten;
        $sanPham->mo_ta             = $request->mo_ta;
        $sanPham->loai_san_pham_id  = $request->loai_san_pham;
        $sanPham->thong_tin         = $request->thong_tin; 
        $sanPham->trang_thai        =1;   
        $sanPham->save();
        
        for($i=0;$i<count($paths);$i++)
        {
            $hinhAnh=new HinhAnh();
            $hinhAnh->san_pham_id=$sanPham->id;
            $hinhAnh->ten=$paths[$i];
            $hinhAnh->save();
        }
        
        return redirect()->route('san-pham.danh-sach')->with(['thong_bao'=>"Thêm sản phẩm {$sanPham->ten} thành công!"]);
    }
    
    public function danhSach()
    {
        
        $dsSanPham=SanPham::all();
        return view("san-pham.danh-sach", compact('dsSanPham'));
    }

    public function capNhat($id)
    {
        $dsLoaiSanPham=LoaiSanPham::all();
        $sanPham = SanPham::find($id);
        $dsHinhAnh=HinhAnh::where('san_pham_id',$id)->get();
        if (empty($sanPham)) {
            return "Sản phẩm không tồn tại";
        }
        return view('san-pham.cap-nhat', compact('sanPham', 'dsLoaiSanPham','dsHinhAnh'));
    }
    public function xuLyCapNhat(Request $request, $id)
    {
        $sanPham = SanPham::find($id);
        $files=$request->hinh_anh;
        

            $sanPham->ten               = $request->ten;
            $sanPham->mo_ta             = $request->mo_ta;
            $sanPham->gia_ban           = $request->gia_ban;
            $sanPham->so_luong          = $request->so_luong;
            $sanPham->loai_san_pham_id  = $request->loai_san_pham;
            
            if(isset($request->trang_thai))
            {
                $sanPham->trang_thai=1;
            }
            else
            {
                $sanPham->trang_thai=0;
            }
            $sanPham->thong_tin         = $request->thong_tin;
            $sanPham->save();

            
        if(!empty($files))
        {
            $paths=[];
            
            foreach($files as $file)
            {
                $paths[]=$file -> store('uploads');
            
            }
           
            for($i=0;$i<count($paths);$i++)
            {
                $hinhAnh=new HinhAnh();
                $hinhAnh->san_pham_id=$id;
                $hinhAnh->ten=$paths[$i];
                $hinhAnh->save();
            }
        }  
        return redirect()->route('san-pham.danh-sach')->with(['thong_bao'=>"Cập nhật sản phẩm {$sanPham->ten} thành công!"]);
    }

    public function xoa($id)
    {
        $sanPham = SanPham::find($id);
        if (empty($sanPham)) {
            return "Sản phẩm không tồn tại";
        }
        $sanPham->trang_thai=0;
        $sanPham->save();
        return redirect()->route('san-pham.danh-sach')->with(['thong_bao'=>"Xóa sản phẩm {$sanPham->ten} thành công!"]);
    }
}
