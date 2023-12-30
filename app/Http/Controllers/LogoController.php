<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Slides;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function themMoi()
    {
        return view("logo.them-moi");
    }
    public function xuLyThemMoi(Request $request)
    {
       
        if (isset($request->hinh_anh)) {
            $loGo = new Logo;
            $file=$request->hinh_anh;
            $path=$file->store('logo');
            $loGo->img_url          = $path;
            $loGo->save();
            return redirect()->route('slides.danh-sach')->with(['thong_bao'=>"Thêm LOGO thành công!"]);
        }
        return view('logo.them-moi');
    }
    public function capNhat($id)
    {
        $loGo = Logo::find($id); 
        return view("logo.cap-nhat",compact('loGo'));
    }
    public function xuLyCapNhat(Request $request, $id)
    {
        $loGo = Logo::find($id);
    
        if ($loGo && $request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            $path = $file->store('logo');
    
            // Update attributes of the logo model
            $loGo->img_url = $path;
            // Update other attributes if needed
            // $loGo->ten_logo = $request->ten_logo;
    
            $loGo->save();
    
            return redirect()->route('slides.danh-sach')->with(['thong_bao' => "Cập nhật Logo thành công!"]);
        }
    
        return view('logo.them-moi');
    }
    
    public function xoa($id)
    {

        $loGo = Logo::find($id); 
        if(!empty($loGo->img_url))
        {
            $imgPath=$loGo->img_url;
            if (file_exists(public_path($imgPath))) {
            unlink(public_path($imgPath));
            $loGo->delete();
            }
        }
        $dsLogo = Logo::all();
        $dsSlide = Slides::all();
        return redirect()->route('slides.danh-sach',compact("dsSlide","dsLogo"));
    }

}
