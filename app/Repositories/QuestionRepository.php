<?php

namespace App\Repositories;

use App\Models\Question;

class QuestionRepository
{

    public function __construct()
    {
    }

    public function createQuestion(array $data): Question
    {
        $question = Question::query()->create($data);

        return $question->refresh();
    }

    public function getAllQuestion()
    {
        return Question::with(['technology', 'level'])->get();
    }

    public function getQuestionById($id)
    {
        return Question::with(['technology', 'level'])->where('id', $id)->first();
    }

    public function updateQuestion($id, array $data)
    {
        return Question::query()
                ->where('id', $id)
                ->update($data);
    }

    public function deleteQuestion($id)
    {
        return Question::query()
                ->where('id', $id)
                ->delete();
    }

    public function getAllQuestionByTechnologyAndLevel(int $technology_id, int $level_id)
    {
        return Question::with(['technology', 'level'])
                ->where([
                    'technology_id' => $technology_id,
                    'level_id' => $level_id
                ])
                ->get();
    }

}
