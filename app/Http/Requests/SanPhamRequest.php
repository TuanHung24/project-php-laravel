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
        return [
            'ten'=>'required|min:10',
            'do_phan_giai'=>'required|min:10',

            'trong_luong'=>'required|min:3',
            'mo_ta'=>'required|min:10',
            'kich_thuoc'=>'required|min:10|max:100',
            'man_hinh'=>'required|min:3|max:20',
            'he_dieu_hanh'=>'required|min:6|max:32',

            'ram'=>'required|min:1',
            'camera'=>'required|min:6',
            'pin'=>'required|min:4|max:6'

            
        ];
    }
    public function messages()
    {
        return[
            'ten.required'=>"Tên sản phẩm không được bỏ trống!",
            'ten.min'=>"Tên phải lớn hơn :min ký tự!",
            'do_phan_giai.required'=>"Độ phân giải không được bỏ trống!",
            'do_phan_giai.min'=>"Độ phân giải phải lớn hơn :min ký tự!",
            'trong_luong.required'=>"Trọng lượng không được bỏ trống!",
            'trong_luong.min'=>"Trọng lượng phải lớn hơn :min ký tự!",
            
            'mo_ta.required'=>"Mô tả không được bỏ trống!",
            'mo_ta.min'=>"Mô tả phải lớn hơn :min ký tự!",
            'kich_thuoc.required'=>"Kích thước không được bỏ trống!",
            'kich_thuoc.min'=>"Kích thước phải lớn hơn :min ký tự!",
            'kich_thuoc.max'=>"Kích thước phải nhỏ hơn :max ký tự!",  

            'man_hinh.required'=>"Màn hình không được bỏ trống!",
            'man_hinh.min'=>"Màn hình phải lớn hơn :min ký tự!",
            'man_hinh.max'=>"Màn hình phải nhỏ hơn :max ký tự!",
            
            'he_dieu_hanh.required'=>"Hệ điều hành không được bỏ trống!",
            'he_dieu_hanh.min'=>"Hệ điều hành phải lớn hơn :min ký tự!",
            'he_dieu_hanh.max'=>"Hệ điều hành phải nhỏ hơn :max ký tự!",
            'ram.required'=>"Ram không được bỏ trống!",
            'ram.min'=>"Ram phải lớn hơn :min ký tự!",  

            'camera.required'=>"Camera không được bỏ trống!",
            'camera.min'=>"Camera phải lớn hơn :min ký tự!",
            'pin.required'=>"Pin không được bỏ trống!",
            'pin.min'=>"Pin phải lớn hơn :min ký tự!", 
            'pin.max'=>"Pin phải nhỏ hơn :max ký tự!"
        ];
        
    }
}
