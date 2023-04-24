<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeveloperLevelFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'level' => 'required|string'
        ];
    }
}
