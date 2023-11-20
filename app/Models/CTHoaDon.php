<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHoaDon extends Model
{
    use HasFactory;
    protected $table="chi_tiet_hoa_don";
    public function san_pham()
    {
        return $this->belongsTo(SanPham::class);
    }
}
