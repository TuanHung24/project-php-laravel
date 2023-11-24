<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MauSac extends Model
{
    use HasFactory;
    protected $table ="color";
    public function san_pham()
    {
        return $this->belongsTo(SanPham::class);
    }
}
