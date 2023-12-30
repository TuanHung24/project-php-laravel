<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'ho_ten'=>'required|min:10',
            'email'=>'required|min:15|max:100' . $id,
            'ten_dang_nhap'=>'required|min:6|max:32' . $id,
            'mat_khau'=>'required|min:6|max:128',
            'dien_thoai' =>'required|regex:/^0\d{9}$/',
            'dia_chi'=>'required|min:20|max:100',
        ];
    }
    public function messages(){
        return[
            'ho_ten.required'=>"Tên nhân viên không được bỏ trống!",
            'ho_ten.min'=>"Tên nhân viên phải lớn hơn :min ký tự",
            'email.required'=>"Email không được bỏ trống!",
            'email.min'=>"Email phải lớn hơn :min ký tự!",
            'email.max'=>"Email phải nhỏ hơn :max ký tự!",

            'ten_dang_nhap.required'=>"Tên đăng nhập không được bỏ trống!",
            'ten_dang_nhap.min'=>"Tên đăng nhập phải lớn hơn :min ký tự!",
            'ten_dang_nhap.max'=>"Tên đăng nhập phải nhỏ hơn :max ký tự!",
            'mat_khau.required'=>"Mật khẩu không được bỏ trống!",
            'mat_khau.min'=>"Mật khẩu phải lớn hơn :min ký tự!",
            'mat_khau.max'=>"Mật khẩu phải nhỏ hơn :max ký tự!",

            'dien_thoai.required' => 'Số điện thoại không được bỏ trống!',
            'dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 chữ số!',
            'dia_chi.required'=>"Địa chỉ không được bỏ trống!",
            'dia_chi.min'=>"Địa chỉ phải lớn hơn :min ký tự!",
            'dia_chi.max'=>"Địa chỉ phải nhỏ hơn :max ký tự!",
        ];
    }
}
