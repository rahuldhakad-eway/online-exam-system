<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TechnologyRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\DeveloperLevelRepository;

class ApiController extends Controller
{
    public function __construct(
        private TechnologyRepository $technologyRepository,
        private QuestionRepository $questionRepository,
        private DeveloperLevelRepository $developerLevelRepository,
        )
    {
    }

    public function getAllTechnology(Request $request)
    {
       $technologies = $this->technologyRepository->getAllTechnology();
        if ($technologies) {
            $response["status"] = true;
            $response["technologies"] = $technologies;
        } else {
            $response["status"] = false;
            $response["message"] = 'technologies are not found';
        }

        return response()->json($response);
    }

    public function getAllQuestion(Request $request, int $technology_id, int $level_id)
    {
       $questions = $this->questionRepository->getAllQuestionByTechnologyAndLevel($technology_id, $level_id);
        if ($questions) {
            $response["status"] = true;
            $response["questions"] = $questions;
        } else {
            $response["status"] = false;
            $response["message"] = 'questions are not found';
        }

        return response()->json($response);
    }

    public function getAllDeveloperLevel(Request $request)
    {
       $developerLevels = $this->developerLevelRepository->getAllLevel();
        if ($developerLevels) {
            $response["status"] = true;
            $response["developerLevels"] = $developerLevels;
        } else {
            $response["status"] = false;
            $response["message"] = 'developerLevels are not found';
        }

        return response()->json($response);
    }
}