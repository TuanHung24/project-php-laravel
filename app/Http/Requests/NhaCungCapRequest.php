<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaCungCapRequest extends FormRequest
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
           'dien_thoai'=>'required|min:10|max:11',
           'dia_chi'=>'required|min:10|max:100',
        ];
    }
    public function messages(){
        return[
            'ten.required'=>"Tên nhà cung cấp không được bỏ trống!",
            'ten.min'=>'Tên nhà cung cấp phải nhỏ hơn :min ký tự!',

            'dien_thoai.required'=>"Số điện thoại nhà cung cấp không được bỏ trống!",
            'dien_thoai.min'=>"Số điện thoại nhà cung cấp phải lớn hơn :min ký tự!",
            'dien_thoai.max'=>"Số điện thoại nhà cung cấp phải nhỏ hơn :max ký tự!",

            'dia_chi.required'=>"Địa chỉ nhà cung cấp không được bỏ trống!",
            'dia_chi.min'=>"Địa chỉ nhà cung cấp phải lớn hơn :min ký tự!",
            'dia_chi.max'=>"Địa chỉ nhà cung cấp phải nhỏ hơn :max ký tự!",
        ];
    }
}
