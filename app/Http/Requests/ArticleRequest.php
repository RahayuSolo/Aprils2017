<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest

{

    public function authorize()

    {

        return true;

    }

    public function rules()

    {

        $id = $this->article;

        return [

            'title' => 'required|unique:articles,title,'.$id.'|max:255',

            'content' => 'required|unique:articles,content,'.$id.'|min:50'

        ];

    }

    public function messages()

    {

        return [

            'title.required' => 'Title is required, at least fill a character',

            'title.unique' => 'Title must unique, take another title'

        ];

    }

}