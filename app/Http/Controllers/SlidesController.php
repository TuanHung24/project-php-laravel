<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Slides;
use App\Http\Requests\SlidesRequest;
use Illuminate\Support\Sleep;

class SlidesController extends Controller
{
    public function themMoi()
    {
        return view("slides.them-moi");
    }
    public function xuLyThemMoi(SlidesRequest $request)
    {
       
        if (isset($request->hinh_anh)) {
            $silDe = new Slides;
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
    public function xuLyCapNhat(SlidesRequest $request,$id)
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
    public function xoa($id)
    {
        $silDe = Slides::find($id); 
        if(!empty($silDe->img_url))
        {
            $imgPath=$silDe->img_url;
            if (file_exists(public_path($imgPath))) {
            unlink(public_path($imgPath));
            $silDe->delete();
            }
        }
        $dsSlide = Slides::all();
        return view("slides.danh-sach",compact('dsSlide'));
    }
}
