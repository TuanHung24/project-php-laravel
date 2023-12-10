<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MauSacRequest extends FormRequest
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
            'mau_sac'=>'required|min:2|max:10',
        ];
    }
    public function messages(){
        return[
                'mau_sac.required'=>"màu sắc không được bỏ trống!",
                'mau_sac.min'=>"màu sắc phải lớn hơn :min ký tự!",
                'mau_sac.max'=>'màu sắc phải nhỏ hơn :max ký tự!',
        ];
    }
}
