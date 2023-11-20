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
        $nhanVien->ho_ten='Hung';
        $nhanVien->username='admin';
        $nhanVien->password=Hash::make('123');
        $nhanVien->save();

        echo "Thêm nhân viên thành công";

    }
}
