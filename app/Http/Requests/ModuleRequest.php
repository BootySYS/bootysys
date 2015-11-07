<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Gate;

class ModuleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create-module');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        sleep(4);
        return [
            'name'          => 'required|unique:modules',
            'short_name'    => 'required|unique:modules',
            'description'   => 'required',
            'professors'    => 'required|array'
        ];
    }
}
