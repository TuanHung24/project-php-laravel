<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\CTPhieuNhapController;
use App\Http\Controllers\HinhAnhController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\MauSacController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function(){
    
    Route::get('/', [SanPhamController::class, 'danhSach'])->name('san-pham.danh-sach');
    Route::get('hinh-anh/{id}', [HinhAnhController::class, 'hinhAnhXoa'])->name('hinh-anh');
    Route::get('dang-xuat', [DangNhapController::class, 'dangXuat'])->name('dang-xuat');
    Route::get('thong-tin',[DangNhapController::class,'thongTin'])->name('thong-tin');
    Route::get('admin/doi-mat-khau', [DangNhapController::class, 'DoiMatKhau'])->name('doi-mat-khau');
    Route::post('admin/doi-mat-khau', [DangNhapController::class, 'xlDoiMatKhau'])->name('xl-doi-mat-khau');
    Route::prefix('san-pham')->group(function(){
        Route::name('san-pham.')->group(function(){
            Route::get('them-moi', [SanPhamController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi', [SanPhamController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('/', [SanPhamController::class, 'danhSach'])->name('danh-sach');
            Route::get('cap-nhat/{id}', [SanPhamController::class, 'capNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}', [SanPhamController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
            Route::get('xoa/{id}', [SanPhamController::class, 'xoa'])->name('xoa');
        });
    });

    Route::prefix('loai-san-pham')->group(function(){
        Route::name('loai-san-pham.')->group(function(){
            Route::get('/', [LoaiSanPhamController::class, 'danhSach'])->name('danh-sach');
            Route::get('them-moi',[LoaiSanPhamController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[LoaiSanPhamController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('cap-nhat/{id}', [LoaiSanPhamController::class, 'capNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}', [LoaiSanPhamController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
            Route::get('xoa/{id}', [LoaiSanPhamController::class, 'xoa'])->name('xoa');
        });
    });

    Route::prefix('nhap-hang')->group(function(){
        Route::name('nhap-hang.')->group(function(){
            Route::get('them-moi',[CTPhieuNhapController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[CTPhieuNhapController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('chi-tiet/{id}',[CTPhieuNhapController::class, 'chiTiet'])->name('chi-tiet');
            Route::get('xoa/{id}',[CTPhieuNhapController::class, 'xoa'])->name('xoa');
            Route::get('/',[CTPhieuNhapController::class, 'danhSach'])->name('danh-sach');
        });
    });
    Route::prefix('khach-hang')->group(function(){
        Route::name('khach-hang.')->group(function(){
            Route::get('/', [KhachHangController::class, 'danhSach'])->name('danh-sach');
            Route::get('them-moi',[KhachHangController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[KhachHangController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('cap-nhat/{id}', [KhachHangController::class, 'capNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}', [KhachHangController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
            Route::get('xoa/{id}', [KhachHangController::class, 'xoa'])->name('xoa');
        });
    });

    Route::prefix('pdf')->group(function(){
        Route::name('pdf.')->group(function(){
            Route::get('hd/{id}',[PDFController::class, 'export_bill_pdf'])->name('hoa-don');
            Route::get('nh/{id}',[PDFController::class, 'export_goods_pdf'])->name('nhap-hang');
        });
    });

    Route::prefix('hoa-don')->group(function(){
        Route::name('hoa-don.')->group(function(){
            Route::get('/',[HoaDonController::class, 'danhSach'])->name('danh-sach');
            Route::get('chi-tiet/{id}',[HoaDonController::class, 'chiTiet'])->name('chi-tiet');
            Route::get('them-moi',[HoaDonController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[HoaDonController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('xoa/{id}',[HoaDonController::class, 'xoa'])->name('xoa');
        });
    });

    Route::prefix('nha-cung-cap')->group(function(){
        Route::name('nha-cung-cap.')->group(function(){
            Route::get('/', [NhaCungCapController::class, 'danhSach'])->name('danh-sach');
            Route::get('them-moi',[NhaCungCapController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[NhaCungCapController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('cap-nhat/{id}', [NhaCungCapController::class, 'capNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}', [NhaCungCapController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
            Route::get('xoa/{id}', [NhaCungCapController::class, 'xoa'])->name('xoa');
        });
    });

    Route::prefix('nhan-vien')->group(function(){
        Route::name('nhan-vien.')->group(function(){
            Route::get('/', [NhanVienController::class, 'danhSach'])->name('danh-sach');
            Route::get('them-moi',[NhanVienController::class, 'themMoi'])->name('them-moi');
            Route::post('them-moi',[NhanVienController::class, 'xuLyThemMoi'])->name('xl-them-moi');
            Route::get('cap-nhat/{id}', [NhanVienController::class, 'capNhat'])->name('cap-nhat');
            Route::post('cap-nhat/{id}', [NhanVienController::class, 'xuLyCapNhat'])->name('xl-cap-nhat');
            Route::get('xoa/{id}', [NhanVienController::class, 'xoa'])->name('xoa');
        });
    });


    Route::prefix('mau-dung-luong')->group(function(){
        Route::name('mau-dung-luong.')->group(function(){
            Route::get('/', [MauSacController::class, 'danhSach'])->name('danh-sach');
            Route::get('/them-moi', [MauSacController::class, 'themMoi'])->name('them-moi');
        });
    });

});

Route::middleware('guest')->group(function(){
    Route::get('dang-nhap', [DangNhapController::class, 'dangNhap'])->name('dang-nhap');
    Route::post('dang-nhap', [DangNhapController::class, 'xuLyDangNhap'])->name('xl-dang-nhap');
});




















