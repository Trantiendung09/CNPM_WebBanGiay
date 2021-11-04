<?php

namespace App\Http\Requests\brand;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
            'name'=>'required|unique:brand',
        ];
    }
    public function messages()
    {
        return [
             'name.required'=>"Vui lòng nhập tên thương hiệu ",
             'name.unique'=>"Thông tin này đã bị trùng với thông tin trước đó"
            ];
    }
}
