<?php

namespace Teedlee\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveContest extends FormRequest
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
            'user_id' => 'integer|in:users',
            'title' => 'required',
            'start' => 'date',
            'end' => 'date',
            'banner' => 'string',
            'description' => 'string',
            'created_at' => 'date',
        ];
    }
}
