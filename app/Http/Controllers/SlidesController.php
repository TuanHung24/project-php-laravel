<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Slides;

class SlidesController extends Controller
{
    public function themMoi()
    {
        return view("slides.them-moi");
    }
    public function xuLyThemMoi(Request $request)
    {
        
        if($request->tieu_de!=null)
        {
            $silDe = new Slides();
            $file=$request->hinh_anh;
            $path=$file->store('slide');
            $silDe->img_url          = $path;
            $silDe->tieu_de          = $request->tieu_de;
           
            $silDe->save();
            return redirect()->route('slides.danh-sach')->with(['thong_bao'=>"Thêm slide {$silDe->tieu_de} thành công!"]);
        }
        return view('slides.them-moi');
        
    }

    public function danhSach(){
        $dsSlide = Slides::all();
        return view("slides.danh-sach",compact("dsSlide"));
    }

    public function capNhat($id)
    {
        $silDe = Slides::find($id); 
        return view("slides.cap-nhat",compact('silDe'));
    }
    public function xuLyCapNhat(Request $request,$id)
    {
        
        if($request->tieu_de!=null || isset($request->hinh_anh))
        {
            $silDe = Slides::find($id);
            $file=$request->hinh_anh;
            $path=$file->store('slide');
            $silDe->img_url          = $path;
            $silDe->tieu_de          = $request->tieu_de;
           
            $silDe->save();
            return redirect()->route('slides.danh-sach')->with(['thong_bao'=>"Thêm slide {$silDe->tieu_de} thành công!"]);
        }
        return view('slides.them-moi');
        
    }
}
