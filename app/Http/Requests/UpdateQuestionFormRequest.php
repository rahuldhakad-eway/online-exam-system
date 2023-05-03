<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'technology_id' => 'required|numeric',
            'level_id' => 'required|numeric',
            'question_text' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
            'option4' => 'required|string',
            'answer_type' => 'required|numeric',
            'answer'=> 'required|numeric',
            'time_required' => 'required| string'


        ];
    }
}
