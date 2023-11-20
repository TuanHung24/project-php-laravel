<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use Illuminate\Http\Request;

class APIHoaDonController extends Controller
{
    public function themHoaDon(Request $request)
    {
        $hoaDon=new HoaDon();
        
        if(empty($request->hd[0]['khach_hang']))
        {
            return response()->json([
                'success'=>false,
                'message'=>"Thanh toán không thành công!"
            ]);
        }
        $hoaDon->khach_hang=$request->hd[0]['khach_hang'];
        $hoaDon->phuong_thuc_tt=$request->hd[0]['phuong_thuc_tt'];   
        $hoaDon->save();
            return response()->json([
                "success"=>true,
                "message"=>"Thanh toán thành công!"
            ]);
        
    }
}
