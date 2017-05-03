<?php

namespace prueba_laravel\Http\Requests;

use prueba_laravel\Http\Requests\Request;

class UserRequest extends Request
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
            'name'      =>  'min:5|max:30|required',
            'email'     =>  'min:5|max:50|required|unique:users',
            'password'  =>  'min:5|max:50|required',
            'type'      =>  'required'
        ];
    }
}