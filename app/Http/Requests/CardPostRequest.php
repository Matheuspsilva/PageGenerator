<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardPostRequest extends FormRequest
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

            'name' => 'required|unique:cards|max:255',
            'linkedin' => 'required|unique:cards|max:255',
            'github' => 'required|unique:cards|max:255',

        ];
    }
}
