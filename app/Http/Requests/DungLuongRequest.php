<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DungLuongRequest extends FormRequest
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
            'dung_luong'=>'required|min:1|max:100',
        ];
    }
    public function messages(){
        return [
            'dung_luong.required'=>"dung lượng không được bỏ trống!",
            'dung_luong.min'=>"dung lượng phải lốn hơn :min ký tự!",
            'dung_luong.max'=>"dung lượng phải nhỏ hơn :max ký tự!",
        ];
    }
}
