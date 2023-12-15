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
        $dsHoaDon = HoaDon::all();
        $dsnhanVien=QuanTri::all();
        $dsSanPham=SanPham::all();
        $dsDungLuong=DungLuong::all();
        $dsMauSac=MauSac::all();
        return view("hoa-don.them-moi",compact('dsHoaDon','dsnhanVien','dsSanPham','dsDungLuong','dsMauSac'));
 
    }

    public function xuLyThemMoi(HoaDonRequest $request)
    {
        try
        {
        $hoaDon= new HoaDon();
        $hoaDon->nhan_vien_id = Auth::user()->id;
        $hoaDon->khach_hang= $request->kHang[0];
        $hoaDon->save();
        $tongTien=0;
       
        for($i=0;$i<count($request->spID);$i++)
        {
           $ctHoaDon =new CTHoaDon();
           $ctHoaDon->hoa_don_id=$hoaDon->id;
           $ctHoaDon->san_pham_id=$request->spID[$i];
           $ctHoaDon->so_luong=$request->soLuong[$i];
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
    public function laySoLuongSanPham(Request $request)
    {
        $maxQuantity = CTSanPham::where('san_pham_id', $request->product)
                            ->where('mau_sac_id', $request->color)
                            ->where('dung_luong_id',$request->capacity)
                            ->value('so_luong');
        return response()->json(['maxQuantity' => $maxQuantity]);
    }

    public function layMauSacDungLuong(Request $request)
    {
        $sanPham        = SanPham::find($request->productId);
        $dsMauSac       = $sanPham->chi_tiet_san_pham->pluck('mau_sac.ten', 'mau_sac_id');
        $dsDungLuong    = $sanPham->chi_tiet_san_pham->pluck('dung_luong.ten', 'dung_luong_id');
        
        return response()->json(['colors' => $dsMauSac, 'sizes' => $dsDungLuong]);
    }
    public function layGiaBanSanPham(Request $request)
    {
        
        $giaBan = CTSanPham::where('san_pham_id', $request->productid)
                                ->where('mau_sac_id', $request->colorid)
                                ->where('dung_luong_id', $request->sizeid)
                                ->value('gia_ban');
        
        return response()->json(['giaBan' => $giaBan]);
       
    }

    
}
