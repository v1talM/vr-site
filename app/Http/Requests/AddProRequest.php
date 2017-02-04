<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProRequest extends FormRequest
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
            'pro_title' => 'required|max:20',
            'pro_thumb' => 'required',
            'pro_photo' => 'required'
        ];
    }
}
