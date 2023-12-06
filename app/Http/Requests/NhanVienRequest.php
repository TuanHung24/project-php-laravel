<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienRequest extends FormRequest
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
            'ho_ten'=>'required|min:10',
            'dien_thoai'=>'required|min:10|max:11',
            'email'=>'required|min:20|max:100',
            'dia_chi'=>'required|min:20|max:100',
            'username'=>'required|min:6|max:32',
            'password'=>'required|min:6|max:32',
        ];
    }
    public function messages(){
        return[
            'ho_ten.required'=>"Tên nhân viên không được bỏ trống!",
            'ho_ten.min'=>"Tên nhân viên phải lớn hơn :min ký tự",
            'dien_thoai.required'=>"Điện thoại không được bỏ trống!",
            'dien_thoai.min'=>"Số điện thoại phải lớn hơn :min ký tự",
            'dien_thoai.max'=>"Số điện thoại phải nhỏ hơn :max ký tự",
            
            'email.required'=>"Email không được bỏ trống!",
            'email.min'=>"Email phải lớn hơn :min ký tự!",
            'email.max'=>"Email phải nhỏ hơn :max ký tự!",
            'dia_chi.required'=>"Địa chỉ không được bỏ trống!",
            'dia_chi.min'=>"Địa chỉ phải lớn hơn :min ký tự!",
            'dia_chi.max'=>"Địa chỉ phải nhỏ hơn :max ký tự!",
            
            'username.required'=>"Tên đăng nhập không được bỏ trống!",
            'username.min'=>"Tên đăng nhập phải lớn hơn :min ký tự!",
            'username.max'=>"Tên đăng nhập phải nhỏ hơn :max ký tự!",
            'password.required'=>"Mật khẩu không được bỏ trống!",
            'password.min'=>"Mật khẩu phải lớn hơn :min ký tự!",
            'password.max'=>"Mật khẩu phải nhỏ hơn :max ký tự!",
        ];

    }
}
