<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    use HasFactory;
    protected $table = "phieu_nhap";
    public function nha_cung_cap()
    {
        return $this->belongsTo(NhaCungCap::class);
    }
}




