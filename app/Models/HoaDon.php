<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table="hoa_don";
    public function nhan_vien()
    {
        return $this->belongsTo(NhanVien::class);
    }
    
    public function nha_cung_cap()
    {
        return $this->belongsTo(NhaCungCap::class);
    }
}
