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
        $id = $this->route('id');
        return [
            'ho_ten' => 'required|min:10',
            'dien_thoai' =>'required|regex:/^0\d{9}$/',
            'email' => 'required|min:15|max:80|unique:quan_tri,email,' . $id,
            'dia_chi' => 'required|min:15|max:128',
            'username' => 'required|min:6|max:60|unique:quan_tri,username,' . $id,
            'mat_khau'=> 'required|min:6|max:128',
            'hinh_anh'=> 'image|mimes:jpg,png,jpeg|max:4048'
        ];
    }
    public function messages(){
        return [
            'ho_ten.required' => "Tên nhân viên không được bỏ trống!",
            'ho_ten.min' => "Tên nhân viên phải lớn hơn :min ký tự",
            'dien_thoai.required' => 'Số điện thoại không được bỏ trống!',
            'dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 chữ số!',
            
            'email.required' => "Email không được bỏ trống!",
            'email.min' => "Email phải lớn hơn :min ký tự!",
            'email.max' => "Email phải nhỏ hơn :max ký tự!",
            'email.unique' => "Email đã tồn tại!",
            'dia_chi.required' => "Địa chỉ không được bỏ trống!",
            'dia_chi.min' => "Địa chỉ phải lớn hơn :min ký tự!",
            'dia_chi.max' => "Địa chỉ phải nhỏ hơn :max ký tự!",
    
            'username.required' => "Tên đăng nhập không được bỏ trống!",
            'username.min' => "Tên đăng nhập phải lớn hơn :min ký tự!",
            'username.max' => "Tên đăng nhập phải nhỏ hơn :max ký tự!",
            'username.unique' => "Tên đăng nhập đã tồn tại!",

            'mat_khau.required' => "Tên đăng nhập không được bỏ trống!",
            'mat_khau.min' => "Tên đăng nhập phải lớn hơn :min ký tự!",
            'mat_khau.max' => "Tên đăng nhập phải nhỏ hơn :max ký tự!",

            'hinh_anh.image' => 'File hình ảnh không hợp lệ!',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg!',
            'hinh_anh.max' => 'Hình ảnh không được vượt quá kích thước tối đa 2048KB!',
            
        ];

    }
}
