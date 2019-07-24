<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\Userpassword;

class LoginRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>['required', new Userpassword,],

        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'email' => ':attribute phải đúng định dạng',
            'password.required'=> 'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu phải đủ từ 5->31 kí tự',
            'password.max'=>'Mật khẩu phải đủ từ 5->31 kí tự'
        ];
    }
    public function attributes()
    {
        return [
            'email'=>'Email',
        ];   
    }
}
