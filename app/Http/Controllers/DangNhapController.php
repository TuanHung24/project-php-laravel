<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NhanVien;
use App\Models\QuanTri;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\error;

class DangNhapController extends Controller
{
    public function dangNhap()
    {
        return view('dang-nhap');
    }
    public function xuLyDangNhap(Request $rq)
    {
        
        $user = QuanTri::whereRaw('BINARY username = ?', [$rq->ten_dang_nhap])->first();

        if ($user && Hash::check($rq->password, $user->password) && $user->trang_thai) {
            Auth::login($user, $rq->has('remember'));

            return redirect()->route('san-pham.danh-sach')->with(['dang_nhap' => 'Đăng nhập thành công!']);
        }
       
        return redirect()->route('dang-nhap')->with(['user_name'=>$rq->ten_dang_nhap,'error-login' => 'Mật khẩu không chính xác!']);     
    }
    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('dang-nhap');
    }
    public function thongTin()
    {
        if(Auth::check())
        { 
            return view('thong-tin');
        }
        return view('dang-nhap');
    }
    public function capNhatThongTin(Request $request)
    {
        
        $nhanVien=QuanTri::find(Auth::user()->id);
        if(isset($request->avatar))
        {
            $file=$request->avatar;
            $path=$file->store('avt');
            $nhanVien->avatar_url=$path;
        }
        $nhanVien->username=$request->username;
        $nhanVien->ho_ten=$request->ho_ten;
        $nhanVien->email=$request->email;
        $nhanVien->dien_thoai=$request->dien_thoai;
        $nhanVien->dia_chi=$request->dia_chi;
        $nhanVien->save();
        return redirect()->route('thong-tin')->with(['thong_bao'=>"Cập nhật thông tin thành công!"]);

    }
    public function DoiMatKhau(){
        return view("admin.doi-mat-khau");
    }
    public function xlDoiMatKhau(Request $rq){
        if (!Hash::check($rq->password, Auth::user()->password)) {
            return redirect()->route("doi-mat-khau")->with(['error' => 'Mật khẩu cũ không đúng!']);
        }
        $taiKhoan=QuanTri::find(Auth::user()->id);
        $taiKhoan->password=Hash::make($rq->respassword);
        $taiKhoan->save();
        return redirect()->route('thong-tin')->with(['thong_bao'=>"Thay đổi mật khẩu thành công!"]);
    }
}