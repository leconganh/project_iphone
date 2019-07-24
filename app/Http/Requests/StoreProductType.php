<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductType extends FormRequest
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
     * Get the validation rules that apply to the request.type
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:2|max:255|unique:product_type,name,'.($this->id ?? " "),
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute không được để trống',
            'min'=>':attribute phải đủ từ 2->255 kí tự',
            'max'=>':attribute phải đủ từ 2->255 kí tự',
            'unique'=>':attribute đã tồn tại',
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Tên loại sản phẩm',
        ];       
    }
}
