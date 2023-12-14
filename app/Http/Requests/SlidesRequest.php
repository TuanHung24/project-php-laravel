<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlidesRequest extends FormRequest
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
            'tieu_de'=>'required|min:10|max:40',
        ];
    }
    public function messages(){
        return[
            'tieu_de.required'=>"Tiêu đề không được bỏ trống!",
            'tieu_de.min'=>"Tiêu đề phải lớn hơn :min ký tự!",
            'tieu_de.max'=>'Tiêu đề phải nhỏ hơn :max ký tự!',
        ];
    }
}
