<?php

namespace Teedlee\Http\Requests;

use Teedlee\Http\Requests\Request;

class CreateUser extends Request
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
            'username' => 'required|min:3|max:20|unique:users',
            'email' => 'required|email|unique:users',
//            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|confirmed',
            'password' => 'required|min:6|max:20|alphanum',
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'Password must contain at least 3 letters, a number and a special character',
        ];
    }
}
