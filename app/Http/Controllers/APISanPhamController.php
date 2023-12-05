<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;
class APISanPhamController extends Controller
{
    public function layDanhSach()
    {
        
        $dsSanPham=SanPham::with('loai_san_pham','img','chi_tiet_san_pham')->get();
        
        return response()->json([
            'success' =>true,
            'data'=>$dsSanPham
        ]);
    }
    public function layChiTiet($id)
    {
        $sanPham=SanPham::with(["loai_san_pham",'img','chi_tiet_san_pham'])->find($id);
        if(empty($sanPham))
        {
            return response()->json([
                'success' =>false,
                'message'=>"Sản phẩm ID {$id} không tồn tại"
            ]);
        }
        return response()->json([
            'success' =>true,
            'data'=>$sanPham
        ]);
    }
    public function themMoi(Request $request)
    {
        $sanPham=new SanPham();
        $count = SanPham::where('ten',$request->ten)->count();
        if($count>0)
        {
            return response()->json([
                'success'=>false,
                'message'=>'Tên sản phẩm đã tồn tại'
            ]);
        }
        $sanPham->ten=$request->ten;
        $sanPham->loai_san_pham_id=$request->loai_san_pham;
        $sanPham->so_luong=$request->so_luong;
        $sanPham->gia_ban=$request->gia_ban;
        $sanPham->save();
        
        return response()->json([
            'success'=>true,
            'message'=>"Thêm mới sản phẩm tên {$sanPham->ten} thành công"
        ]);
    }
    public function capNhap(Request $request, $id)
    {
        $sanPham =SanPham::find($id);
        
        if(empty($sanPham))
        {
            return response()->json([
                'success'=>false,
                'message'=>"Sản phẩm ID {$id} không tồn tại"
            ]);
        }
       
        $IdloaiSP= LoaiSanPham::where('id',$request->loai_san_pham)->first();
        if(empty($IdloaiSP))
        {
            return response()->json([
                'success'=>false,
                'message'=>"Loại sản phẩm ID {$request->loai_san_pham} không tồn tại"
            ]);
        }

        $count =SanPham::where('id','<>',$id)->where('ten',$request->ten)->count();
        if($count>0)
        {
            return response()->json([
                'success'=>false,
                'message'=>'Tên sản phẩm đã tồn tại'
            ]);
        }
        if(empty($request->ten)){
            $sanPham->loai_san_pham_id=$request->loai_san_pham;
            $sanPham->so_luong=$request->so_luong;
            $sanPham->gia_ban=$request->gia_ban;
            $sanPham->save();
            return response()->json([
                'success'=>true,
                'message'=>"Cập nhật loại sản phẩm ID {$id} thành công"
            ]);
        } 

        $sanPham->ten=$request->ten;
        $sanPham->loai_san_pham_id=$request->loai_san_pham;
        $sanPham->so_luong=$request->so_luong;
        $sanPham->gia_ban=$request->gia_ban;
        $sanPham->save();
        return response()->json([
            'success'=>true,
            'message'=>"Cập nhật sản phẩm ID {$id} thành công"
        ]);
    }
    public function xoa($id)
    {
        $sanPham= SanPham::find($id);
        
        if(empty($sanPham))
        {
            return response()->json([
                'success'=>false,
                'message'=>"Sản phẩm ID {$id} không tồn tại"
            ]);
        }
        
        $sanPham->trang_thai=0;
        $sanPham->save();
        return response()->json([
            'success'=>true,
            'message'=>"Xóa sản phẩm ID {$id} thành công"
        ]);
    }
    public function timKiem(Request $request )
    {
        $sanPham=SanPham::with('loai_san_pham')->where('ten',$request->ten)->first();
        if(empty($sanPham))
        {
            return response()->json([
                'success'=>false,
                'message'=>"Sản phẩm tên {$request->ten} không tồn tại"
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>$sanPham
        ]);
    }
    
    
}
