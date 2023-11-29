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
            'hinh-anh'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'ten.required'=>"Tên sản phẩm không được bỏ trống!",
            'ten.min'=>"Tên phải lớn hơn :min ký tự!",
            'hinh-anh.required'=>"Hình ảnh không được bỏ trống!"
        ];
        
    }
}
