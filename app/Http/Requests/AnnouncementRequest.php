<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>'require|string|max:120',
            'description'=>'require|text|max:500',
            'brand'=>'require|string|max:50',
            'file'=>'require|string|max:120',

        ];
    }
}
