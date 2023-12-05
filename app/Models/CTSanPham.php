<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTSanPham extends Model
{
    use HasFactory;
    protected $table='chi_tiet_san_pham';
    public function mau_sac()
    {
        return $this->belongsTo(MauSac::class,'mau_sac_id');
    }
    public function dung_luong()
    {
        return $this->belongsTo(DungLuong::class,'dung_luong_id');
    }
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
}
