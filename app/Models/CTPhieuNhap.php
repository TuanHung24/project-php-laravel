<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTPhieuNhap extends Model
{
    use HasFactory;
    protected $table = "chi_tiet_phieu_nhap";
    public function phieu_nhap()
    {
        return $this->belongsTo(PhieuNhap::class);
    }
    public function san_pham()
    {
        return $this->belongsTo(SanPham::class);
    }
}




