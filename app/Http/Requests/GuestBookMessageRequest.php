<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestBookMessageRequest extends FormRequest
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
            'username' => 'required',
            'email' => 'required|email',
            'homepage' => 'nullable|url',
            'message' => 'required',
            'tags' => 'nullable|regex:/^[a-zA-Z0-9_ ]*$/',
        ];
    }
}
