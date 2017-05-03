<?php

namespace prueba_laravel\Http\Requests;

use prueba_laravel\Http\Requests\Request;

class PhoneRequest extends Request
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
            'number'     =>  'min:7|max:12required|unique:phones'
        ];
    }
}
