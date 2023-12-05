<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = "san_pham";
    protected $hidden=['loai_san_pham_id','created_at','updated_at','trang_thai'];
    public function loai_san_pham()
    {
        return $this->belongsTo(LoaiSanPham::class,'loai_san_pham_id');
    }
    public function img()
    {
        return $this->hasMany(HinhAnh::class);
    }
    public function color()
    {
        return $this->hasMany(MauSac::class);
    }
    public function size()
    {
        return $this->hasMany(DungLuong::class);
    }
    public function chi_tiet_san_pham()
    {
        return $this->hasMany(CTSanPham::class);
    }
    
}




