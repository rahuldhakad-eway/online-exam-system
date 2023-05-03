<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'technology_id' => 'required',
            'level_id' => 'required',
            'question_text' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'answer_type' => 'required',
            'answer' => 'required',
            'time_required' => 'required'
        ];
    }
}
