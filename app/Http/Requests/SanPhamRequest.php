<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id=$this->route('id');
        return [ 
            'ten'=>'required|min:6|regex:/^[a-zA-Z0-9\s]+$/u|unique:san_pham,ten,'.$id,
            'do_phan_giai'=>'required|min:6',

            'trong_luong'=>'required|min:3',
            'mo_ta'=>'required|min:10',
            'kich_thuoc'=>'required|min:10|max:100',
           
            'man_hinh'=>'required|min:1|max:20',
            'he_dieu_hanh'=>'required|min:3',

            'ram'=>'required|min:1',
            'camera'=>'required|min:3',
            'pin'=>'required|min:4|max:6',

            'hinh_anh'=> 'image|mimes:jpg,png,jpeg|max:4048'
        ];
        
    }
    public function messages()
    {
        return[
            'ten.required'=>"Tên sản phẩm không được bỏ trống!",
            'ten.min'=>"Tên phải lớn hơn :min ký tự!",
            'ten.unique'=>"Tên sản phẩm không được trùng",
            'ten.regex'=>"Tên không được có ký tự đặc biệt!",
            'do_phan_giai.required'=>"Độ phân giải không được bỏ trống!",
            'do_phan_giai.min'=>"Độ phân giải phải lớn hơn :min ký tự!",
            'trong_luong.required'=>"Trọng lượng không được bỏ trống!",
            'trong_luong.min'=>"Trọng lượng phải lớn hơn :min ký tự!",
            
            'mo_ta.required'=>"Mô tả không được bỏ trống!",
            'mo_ta.min'=>"Mô tả phải lớn hơn :min ký tự!",
            'kich_thuoc.required'=>"Kích thước không được bỏ trống!",
            'kich_thuoc.max'=>"Chiều dài phải từ :min đến :max ký tự!",

            'man_hinh.required'=>"Màn hình không được bỏ trống!",
            'man_hinh.min'=>"Màn hình phải lớn hơn :min ký tự!",
            'man_hinh.max'=>"Màn hình phải nhỏ hơn :max ký tự!",
            
            'he_dieu_hanh.required'=>"Hệ điều hành không được bỏ trống!",
            'he_dieu_hanh.min'=>"Hệ điều hành phải lớn hơn :min ký tự!",
            'ram.required'=>"Ram không được bỏ trống!",
            'ram.min'=>"Ram phải lớn hơn :min ký tự!",  

            'camera.required'=>"Camera không được bỏ trống!",
            'camera.min'=>"Camera phải lớn hơn :min ký tự!",
            'pin.required'=>"Pin không được bỏ trống!",
            'pin.min'=>"Pin phải lớn hơn :min ký tự!", 
            'pin.max'=>"Pin phải nhỏ hơn :max ký tự!",

            'hinh_anh.image' => 'File hình ảnh không hợp lệ!',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg!',
            'hinh_anh.max' => 'Hình ảnh không được vượt quá kích thước tối đa 2048KB!',
        ];
        
    }
}
