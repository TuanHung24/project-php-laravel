<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table="hoa_don";
    public function quan_tri()
    {
        return $this->belongsTo(QuanTri::class);
    }
    
    public function nha_cung_cap()
    {
        return $this->belongsTo(NhaCungCap::class);
    }

    public function getTongTienFormattedAttribute()
    {
        return number_format($this->tong_tien, 0, ',', '.');
    }
    
}
