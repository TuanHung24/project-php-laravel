<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NhanVien extends Authenticatable
{
    use HasFactory;
    protected $table = "nhan_vien";
    public function hoa_don()
    {
        return $this->hasMany(HoaDon::class);
    }
}






