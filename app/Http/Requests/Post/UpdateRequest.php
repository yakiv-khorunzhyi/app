<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                'min:1',
            ],
            'body'  => [
                'required',
                'string',
                'max:512',
                'min:1',
            ],
        ];
    }
}
