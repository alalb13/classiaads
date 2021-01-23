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
        return
        ['title'=>'required|max:120',
        'description'=>'required|max:500'
        ];
    }
}
