<?php

namespace prueba_laravel\Http\Requests;

use prueba_laravel\Http\Requests\Request;

class ArticleRequest extends Request
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
            'title'             =>  'min:8|max:100|required|unique:articles',
            'subcategory_id'    =>  'required',
            'content'           =>  'min:20|required',
            'image'             =>  'image|required'
        ];  
    }
}
