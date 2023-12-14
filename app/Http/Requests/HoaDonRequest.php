<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoaDonRequest extends FormRequest
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
            'nhan_vien'=>'required|min:20|max:100',
            'san_pham'=>'required',
            'khach_hang'=>'required|min:20|max:50',
            'so_luong'=>'required',
            'gia_ban'=>'required',
        ];
    }
    public function messages(){
        return[
            'nhan_vien.required'=>"",
            'san_pham.required'=>"Cần chọn sản phẩm thích hợp!",
            
            'khach_hang.required'=>"Tên khách hàng không được bỏ trống!",
            'khach_hang.min'=>"Tên khách hàng phải lớn hơn :min ký tự!",
            'khach_hang.max'=>"Tên khách hàng phải nhỏ hơn :max ký tự!",

            'so_luong.required'=>"Cần chọn số lượng phù hợp!",
            'gia_ban.required'=>"Giá bán cần xuất đúng",
        ];
    }
}
