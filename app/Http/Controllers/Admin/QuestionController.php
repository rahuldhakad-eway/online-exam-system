<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TechnologyRepository;
use App\Repositories\DeveloperLevelRepository;
use App\Repositories\QuestionRepository;
use App\Http\Requests\QuestionFormRequest;
use App\Http\Controllers\Admin\TechnologyController;
use App\Models\Technology;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateQuestionFormRequest;
use App\Http\Requests\DeleteQuestionFormRequest;

class QuestionController extends Controller
{
    public function __construct(
        private TechnologyRepository $technologyRepository,
        private DeveloperLevelRepository $developerLevelRepository,
        private QuestionRepository $questionRepository
    ) {}

    public function index()
    {
        $questions = $this->questionRepository->getAllQuestion();
        return view('admin.questions.index', compact('questions'));
    }

    public function add()
    {
        $technologies = $this->technologyRepository->getAllTechnology();
        $levels = $this->developerLevelRepository->getAllLevel();
        return view('admin.questions.add', compact('technologies', 'levels'));
    }

    public function submit(QuestionFormRequest $request)
    {
        $data = $request->validated();
        $this->questionRepository->createQuestion($data);

        return redirect()->route('question.home')->with('success', __('messages.question.question_added'));
    }

    public function show($id)
    {
      $question = $this->questionRepository->getQuestionById($id);
      return view('admin.questions.show', compact('question'));
    }

    public function edit($id)
    {
        $question = $this->questionRepository->getQuestionById($id);
        $technologies = $this->technologyRepository->getAllTechnology();
        $levels = $this->developerLevelRepository->getAllLevel();
        
        return view('admin.questions.edit', compact('question', 'technologies', 'levels'));
    }

    public function update(UpdateQuestionFormRequest $request, $id)
    {
        $data = $request->validated();

        $this->questionRepository->updateQuestion($id, $data);
        return redirect()->route('question.home')->with('success', __('messages.question.question_updated'));
        
    }

    public function delete(DeleteQuestionFormRequest $request)
    {
        $data = $request->validated();
        $this->questionRepository->deleteQuestion($data['id']);

        return redirect()->route('question.home')->with('success', __('messages.question.question_deleted'));
    }
}