<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:8',
            'price' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được trống',
            'name.unique' => 'Tên sản phẩm không được trùng',
            'name.max' => 'Tên sản phẩm không dài quá',
            'name.min' => 'Tên sản phẩm không được ngắn qúa',
            'price.required' => 'Price không được để trống',
            'content.required' => 'Description không được để trống',
            'category_id.required' => 'Danh Mục không được để trống',
        ];
    }
}
