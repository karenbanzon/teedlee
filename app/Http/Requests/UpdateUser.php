<?php

namespace Teedlee\Http\Requests;

use Teedlee\Http\Requests\Request;

class UpdateUser extends Request
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
            'avatar'=> 'image|max:2048',
            'username' => 'required|min:3|max:25|unique:users,username,'.\Auth::user()->id,
            'email' => 'required|email|unique:users,email,'.\Auth::user()->id,
            'password' => 'min:6|confirmed',
            'firstname' => 'min:2|max:30',
            'lastname' => 'min:2|max:30',
            'website' => 'url|min:6|max:1024',
            'about_me' => 'min:20',
        ];
    }
}