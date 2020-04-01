<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'coach_name' => 'required|min:3'
        ];
    }
}
