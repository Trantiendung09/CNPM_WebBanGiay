<?php

namespace App\Http\Requests\brand;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
            'file_image'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>"Vui lòng nhập thông tin này",
             'name.unique'=>"Thông tin này đã bị trùng với thông tin trước đó",
             'file_image.required'=>"Vui lòng cập nhật logo",
        ];
    }
}
