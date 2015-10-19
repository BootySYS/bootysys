<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UniversityRegisterRequest extends Request
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
            'name'                  => 'required|min:3',
            'contact_first_name'    => 'required|alpha',
            'contact_last_name'     => 'required|alpha',
            'email'                 => 'required|email|unique:users|unique:universities',
            'state'                 => 'required|alpha_dash',
            'street'                => 'required',
            'city'                  => 'required|alpha',
            'zip_code'              => 'required|numeric',
            'password'              => 'required',
            'confirm_password'      => 'required|same:password'
        ];
    }
}
