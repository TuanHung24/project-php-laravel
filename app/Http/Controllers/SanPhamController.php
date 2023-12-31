<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;
use App\Http\Requests\SanPhamRequest;
use App\Models\CTSanPham;
use App\Models\tTSanPham;
use App\Models\DungLuong;
use App\Models\MauSac;
use App\Models\Logo;
use App\Models\ThongTinSanPham;

class SanPhamController extends Controller
{
    public function themMoi()
    {
        $dsLoaiSanPham=LoaiSanPham::all();
        return view('san-pham.them-moi',compact('dsLoaiSanPham'));
    }

    public function xuLyThemMoi(SanPhamRequest $request)
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
        $sanPham->save();

        $tTSanPham=new ThongTinSanPham();
        $tTSanPham->san_pham_id=$sanPham->id;
        $tTSanPham->do_phan_giai=$request->do_phan_giai;
        $tTSanPham->trong_luong=$request->trong_luong;
        $tTSanPham->man_hinh=$request->man_hinh;
        $tTSanPham->he_dieu_hanh=$request->he_dieu_hanh;
        $tTSanPham->ram=$request->ram;
        $tTSanPham->camera=$request->camera;
        $tTSanPham->pin=$request->pin;
        $tTSanPham->kich_thuoc = $request->kich_thuoc;
        $tTSanPham->save();

        
        for($i=0;$i<count($paths);$i++)
        {
            $hinhAnh=new HinhAnh();
            $hinhAnh->san_pham_id=$sanPham->id;
            $hinhAnh->img_url=$paths[$i];
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
        $tTSanPham=ThongTinSanPham::where('san_pham_id',$id)->first();
        if (empty($sanPham)) {
            return "Sản phẩm không tồn tại";
        }
        return view('san-pham.cap-nhat', compact('sanPham', 'dsLoaiSanPham','dsHinhAnh','tTSanPham'));
    }
    public function xuLyCapNhat(SanPhamRequest $request, $id)
    {
        $sanPham = SanPham::find($id);
        if(!$sanPham){
            $dsSanPham=SanPham::all();
           return view('san-pham.danh-sach',compact('dsSanPham'))->with(["thong_bao"=>"Sản phẩm không tồn tại!"]);
        }
        $files=$request->hinh_anh;
        $sanPham->ten               = $request->ten;
        $sanPham->mo_ta             = $request->mo_ta;
        $sanPham->loai_san_pham_id  = $request->loai_san_pham;
        
        if(isset($request->trang_thai))
        {
            $sanPham->trang_thai=1;
        }
        else
        {
            $sanPham->trang_thai=0;
        }
        $sanPham->save();

        $tTSanPham=ThongTinSanPham::where('san_pham_id',$id)->first();
        $tTSanPham->san_pham_id=$sanPham->id;
        $tTSanPham->do_phan_giai=$request->do_phan_giai;
        $tTSanPham->trong_luong=$request->trong_luong;
        $tTSanPham->man_hinh=$request->man_hinh;
        $tTSanPham->he_dieu_hanh=$request->he_dieu_hanh;
        $tTSanPham->ram=$request->ram;
        $tTSanPham->camera=$request->camera;
        $tTSanPham->pin=$request->pin;
        $tTSanPham->kich_thuoc = $request->kich_thuoc;
        $tTSanPham->save();

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
                $hinhAnh->img_url=$paths[$i];
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
    public function chiTietSanPham($id)
    {
        $sanPham=SanPham::find($id);
        $tTSanPham=ThongTinSanPham::where('san_pham_id',$id)->first();
        $dsHinhAnh=HinhAnh::where('san_pham_id',$id)->get();
        $dsCTSanPham=CTSanPham::where('san_pham_id',$id)->get();
        return view('san-pham.chi-tiet', compact('sanPham', 'tTSanPham', 'dsHinhAnh','dsCTSanPham'));
    }
    public function timKiem(Request $request)
    {
        $reQuest=$request->search_name;
        $dsSanPham=SanPham::where('ten','like','%'.$reQuest.'%')->get();
       
       
       // return view('san-pham.danh-sach',compact('dsSanPham','reQuest'));
       
       // return view('san-pham.danh-sach',compact('dsSanPham','reQuest'))->with(['null_tk'=>"Không tồn tại sản phẩm nào !"]);
        if ($dsSanPham) {
            // Nếu tìm thấy sản phẩm, trả về thông tin sản phẩm hoặc làm gì đó với nó
            return view('san-pham.danh-sach',compact('dsSanPham','reQuest'));
        } else {
            // Nếu không tìm thấy sản phẩm, trả về thông báo
            return back()->with('null_tk', 'Không tìm thấy sản phẩm nào!');
        
        }
    }
}
