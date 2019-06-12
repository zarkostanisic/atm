<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required|unique:users|regex:/^[A-Z]{1}[a-z]*[0-9]{1}[a-z0-9]*$/|min:6',
            'balance' => 'required|numeric',
            'pin' => 'required|digits_between:4,4'
        ];
    }
}
