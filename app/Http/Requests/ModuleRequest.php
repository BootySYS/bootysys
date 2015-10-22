<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ModuleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->role == 'university';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|unique:modules',
            'short_name'    => 'required|unique:modules',
            'description'   => 'required',
            'professors'    => 'required|array'
        ];
    }
}
