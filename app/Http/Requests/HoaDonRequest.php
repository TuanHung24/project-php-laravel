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
            'khach_hang'=>'required|min:20|max:100',
            'so_luong'=>'required',
            'gia_ban'=>'required',
        ];
    }
}
