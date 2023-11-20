<?php

namespace Database\Seeders;

use App\Models\KhachHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ThemKhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $khachHang=new KhachHang();
       $khachHang->ho_ten='abc';
       $khachHang->ten_dang_nhap='hung';
       $khachHang->email='hung@gmail.com';
       $khachHang->password=Hash::make('123');
       $khachHang->save();
       echo 'Thêm khách hàng thành công!';
    }
}
