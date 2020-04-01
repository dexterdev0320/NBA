<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'age' => 'required|numeric',
            'contact_number' => 'required|numeric',
            'team_id' => 'required|numeric'
        ];
    }
}
