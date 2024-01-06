<?php

namespace App\Http\Controllers;

use App\Models\CTSanPham;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\PhieuNhap;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ThongKeController extends Controller
{
    public function danhSach()
    {
        $hoaDon=HoaDon::count();

        $tongTien = HoaDon::sum('tong_tien');
        $tongTienHoaDon = number_format($tongTien, 0, ',', '.');

        $khachHang=KhachHang::count();

        $soLuongSanPham=CTSanPham::sum('so_luong');
        
        $tongGiaNhap=PhieuNhap::sum('tong_tien');
        $tongTienGiaNhap = number_format($tongGiaNhap, 0, ',', '.');

        return view('thong-ke',compact('hoaDon','khachHang','soLuongSanPham','tongTienGiaNhap','tongTienHoaDon'));
    }
    public function ThongKeHoaDon(Request $request){

        try {
            $Month = $request->month;
            $Year = $request->year;
    
            // Chỉ lấy dữ liệu nếu cả hai tham số tháng và năm đều được cung cấp
            if ($Month && $Year) {
                $data = HoaDon::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
                    ->whereYear('created_at', $Year)
                    ->whereMonth('created_at', $Month)
                    ->groupBy('date')
                    ->get();
            } else {
                // Nếu không có tham số, trả về dữ liệu rỗng hoặc thông báo lỗi
                $data = [];
            }
    
           
    
            // Trả về JSON response sau khi kiểm tra request
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Lỗi máy chủ'], 500);
        }
    }
}
