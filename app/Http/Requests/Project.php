<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Project extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'category_id' => 'required|numeric',
        ];
    }
}
