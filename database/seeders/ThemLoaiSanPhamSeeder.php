<?php

namespace Database\Seeders;

use App\Models\LoaiSanPham;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemLoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loaiSanPham=new LoaiSanPham();
        $loaiSanPham->ten="iPhone";
        $loaiSanPham->save();
        echo "Thêm sản phẩm {$loaiSanPham->ten} thành công!";

        $loaiSanPham=new LoaiSanPham();
        $loaiSanPham->ten="Samsung";
        $loaiSanPham->save();
        echo "Thêm sản phẩm {$loaiSanPham->ten} thành công!";

        $loaiSanPham=new LoaiSanPham();
        $loaiSanPham->ten="Xiaomi";
        $loaiSanPham->save();
        echo "Thêm sản phẩm {$loaiSanPham->ten} thành công!";

        $loaiSanPham=new LoaiSanPham();
        $loaiSanPham->ten="OPPO";
        $loaiSanPham->save();
        echo "Thêm sản phẩm {$loaiSanPham->ten} thành công!";

        $loaiSanPham=new LoaiSanPham();
        $loaiSanPham->ten="Nokia";
        $loaiSanPham->save();
        echo "Thêm sản phẩm {$loaiSanPham->ten} thành công!";
    }
}
