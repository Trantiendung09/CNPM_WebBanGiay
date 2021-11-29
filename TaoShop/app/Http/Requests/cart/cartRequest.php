<?php

namespace App\Http\Requests\Acount;

use Illuminate\Foundation\Http\FormRequest;

class acountResquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'name'=>'required',
        'email'=>'required|email',
        // 'password_confirmation' => 'min:8|required_with:password|same:password',
        // 'password'=>'required|min:8',
        'fullname'=>'required',
        'adress'=>'required',
        'phone'=>'required|numeric'
        ];
    }
    public function messages(){
       return [
        'name.required'=>'Vui lòng nhập tên người dùng',
        'email.required'=>'Vui lòng nhập email người dùng',
        'email.email'=>'Email không phù hợp',
        'full_name.required'=>'Vui lòng nhập tên đầy đủ người dùng',
        'adress.required'=>'Vui lòng nhập địa chỉ người dùng',
        'phone.required'=>'Vui lòng nhập số điện thoại người dùng',
        'phone.numeric'=>'Vui lòng nhập số'
       ];
    }
}
