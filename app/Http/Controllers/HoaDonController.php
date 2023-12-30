<?php

namespace App\Http\Controllers;

use App\Models\CTHoaDon;
use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\QuanTri;
use App\Models\SanPham;
use App\Http\Requests\HoaDonRequest;
use App\Models\CTSanPham;
use App\Models\DungLuong;
use App\Models\MauSac;
use Exception;
use Illuminate\Support\Facades\Auth;

class HoaDonController extends Controller
{
    public function themMoi()
    {
        $dsSanPham=SanPham::whereHas('chi_tiet_san_pham',function($query){
                $query->where('so_luong','>',0);
        })->with('chi_tiet_san_pham')->get();
        
        $dsSanPham->each(function ($sanPham) {
            $sanPham->chi_tiet_san_pham = $sanPham->chi_tiet_san_pham->unique('san_pham_id');
        });
        return view("hoa-don.them-moi",compact('dsSanPham'));
 
    }

    public function xuLyThemMoi(Request $request)
    {
        try
        {
        $hoaDon= new HoaDon();
        $hoaDon->quan_tri_id = $request->qt;
        $hoaDon->khach_hang= $request->kh;
        $hoaDon->dien_thoai= $request->dien_thoai;
        $hoaDon->save();
        $tongTien=0;
       
        for($i=0;$i<count($request->spID);$i++)
        {
           $ctHoaDon =new CTHoaDon();
           $ctHoaDon->hoa_don_id=$hoaDon->id;
           $ctHoaDon->san_pham_id=$request->spID[$i];
           $ctHoaDon->mau_sac_id=$request->msID[$i];
           $ctHoaDon->dung_luong_id=$request->dlID[$i];
           $ctHoaDon->so_luong=$request->soLuong[$i];

           $ctSanPham = CTSanPham::where('san_pham_id', $request->spID[$i])
            ->where('mau_sac_id', $request->msID[$i])
            ->where('dung_luong_id', $request->dlID[$i])
            ->first();
            if(!empty($ctSanPham))
            {
                
                $ctSanPham->so_luong-=$ctHoaDon->so_luong;
                $ctSanPham->save();
            }
            
            
           $ctHoaDon->don_gia=$request->giaBan[$i];
           $ctHoaDon->thanh_tien=$request->thanhTien[$i];
           $ctHoaDon->save();
           
            $tongTien += $ctHoaDon->thanh_tien;
        }
        $hoaDon->tong_tien=$tongTien;
        $hoaDon->save();
        return redirect()->route('hoa-don.danh-sach')->with(['thong_bao'=>"Nhập hóa đơn thành công!"]);
        }catch(Exception $ex)
        {
            $dsHoaDon = HoaDon::all();
            $dsnhanVien=QuanTri::all();
            $dsSanPham=SanPham::all();
            return view("hoa-don.them-moi",compact('dsHoaDon','dsnhanVien','dsSanPham'));
        }
    }
    public function danhSach()
    {
        $dsHoaDon=HoaDon::all();
        return view("hoa-don.danh-sach", compact('dsHoaDon'));
    }
    public function chiTiet($id)
    {
        
        $dsCTHoaDon=CTHoaDon::where('hoa_don_id',$id)->get();
        
        
        if(empty($dsCTHoaDon))
        {
            return "Chi tiết hóa đơn không tồn tại";
        }
        return view("hoa-don.chi-tiet",compact('dsCTHoaDon'));
        
    }
    public function xoa($id)
    {

        $cTHoaDon=CTHoaDon::where('hoa_don_id',$id)->get();

        $hoaDon=HoaDon::find($id);
        if(empty($cTHoaDon))
        {
            return "Chi tiết hóa đơn không tồn tại";
        }
        $hoaDon->trang_thai=0;
        $hoaDon->save();
        $dsHoaDon=HoaDon::all();
        return redirect()->route('hoa-don.danh-sach',compact('dsHoaDon'))->with(['thong_bao'=>"Xóa hóa đơn thành công!"]);;
    } 
    public function timKiem(Request $request)
    {
        $reQuest=$request->search_name;
        $dsHoaDon=HoaDon::where('khach_hang','like','%'.$reQuest.'%')->get();
        return view('hoa-don.danh-sach',compact('dsHoaDon','reQuest'));
    }
    public function layMauSacDungLuong(Request $request)
    {
        $dsSanPham = CTSanPham::where('san_pham_id',$request->productId)->get();
        return view('hoa-don.chi-tiet-hoa-don',compact('dsSanPham'));
    }
    

    
}
