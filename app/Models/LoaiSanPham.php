<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
    protected $hidden=['created_at','updated_at','trang_thai'];
    protected $table = "loai_san_pham";
    public function san_pham()
    {
        return $this->hasMany(SanPham::class);
    }
    public function img()
    {
        return $this->belongsTo(HinhAnh::class);
    }
}




