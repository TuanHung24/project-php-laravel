<?php

namespace App\Http\Controllers;

use App\Models\CTHoaDon;
use App\Models\HoaDon;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;

class APIHoaDonController extends Controller
{
    public function themHoaDon(Request $request)
    {
        
        
        if(empty($request->hd[0]))
        {
            return response()->json([
                'success'=>false,
                'message'=>"Thanh toán không thành công!"
            ]);
        }
        $hoaDon=new HoaDon();
        $hoaDon->khach_hang=$request->hd[0]['khach_hang'];
        $hoaDon->tong_tien=$request->hd[0]['tong_tien'];
        $hoaDon->dia_chi=$request->hd[0]['dia_chi'];
        $hoaDon->dien_thoai=$request->hd[0]['dien_thoai'];
        $hoaDon->phuong_thuc_tt=$request->hd[0]['phuong_thuc_tt'];   
        $hoaDon->save();

            return response()->json([
                "success"=>true,
                "message"=>"Thanh toán thành công!"
            ]);
        
    }
}
