<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bio' => 'max:100',
            'about' => 'required',
            'date_of_birth' => 'required|date',
            'fb' => 'max:100',
            'tw' => 'max:100',
            'gh' => 'max:100',
            'state' => 'required|max:25',
            'country' => 'required|max:25',
            'wapp' => 'max:10',
            'pic' => 'image',
        ];
    }
}
