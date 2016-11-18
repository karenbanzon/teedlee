<?php

namespace Teedlee\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveJudge extends FormRequest
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
        if( $this->ajax() )
        {
            return [
                'username' => 'required|unique:users',
                'email' => 'required|unique:users',
                'password' => 'required|min:5|max:20'
            ];

        } else {
            return [
                'username' => 'required|unique:users',
                'email' => 'required|unique:users',
                'firstname' => 'required',
                'lastname' => 'required',
                'password' => 'required|min:5|max:20|confirmed',
                'password_confirmation' => 'required',
            ];
        }
    }
}
