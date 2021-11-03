<?php

namespace App\Http\Requests\product;

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
        'name'=>'required',
        'photo_id'=>'required',
        'brand_id'=>'required',
        'category_id'=>'required',
        'color'=>'required',
        'note'=>'required',
        'size'=>'required',
        'price'=>'required',
        'quantity'=>'required'
        ];
    }
    public function messages()
    {
        return [
        'name'=>'vui lòng điền thông tin sản phẩm',
        'note'=>'vui lòng nhập mô tả sản phẩm',
        'photo_id'=>'ảnh sản phẩm chưa được nhập id',
        'brand_id'=>'vui lòng nhập thương hiệu',
        'category_id'=>'vui lòng nhập ',
        'color'=>'vui lòng nhập màu sản phẩm',
        'size'=>'vui lòng nhập size sản phẩm',
        'price'=>'vui lòng nhập giá sản phẩm',
        'quantity'=>'vui lòng nhập số lượng',
        ];
    }
}
