<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class ThemAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nhanVien=new NhanVien();
        $nhanVien->ho_ten='Nguyễn Tuấn Dĩ';
        $nhanVien->username='admin123';
        $nhanVien->password=Hash::make('123456');
        $nhanVien->save();

        echo "Thêm nhân viên thành công";

    }
}
