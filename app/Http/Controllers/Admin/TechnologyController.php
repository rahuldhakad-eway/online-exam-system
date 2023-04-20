<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TechnologyFormRequest;
use App\Http\Requests\DeleteTechnologyFormRequest;
use App\Repositories\TechnologyRepository;

class TechnologyController extends Controller
{
    public function __construct(private TechnologyRepository $technologyRepository) {}

    public function index()
    {
        $technologies = $this->technologyRepository->getAllTechnology();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function add()
    {
        return view('admin.technologies.add');
    }

    public function submit(TechnologyFormRequest $request)
    {
        $data = $request->validated();
        $technology = $this->technologyRepository->createTechnology($data);

        return redirect()->route('technology.home')->with('success', __('messages.technology.technology_added'));
    }

    public function edit(Request $request, $id)
    {
        $technology = $this->technologyRepository->getTechnologyById($id);
        
        return view('admin.technologies.edit', [
            'technology' => $technology
        ]);
    }

    public function update(TechnologyFormRequest $request, $id)
    {
        $data = $request->validated();
        $rs = $this->technologyRepository->updateTechnology($id, $data);

        return redirect()->route('technology.home')->with('success', __('messages.technology.technology_updated'));
    }

    public function delete(DeleteTechnologyFormRequest $request)
    {
        $data = $request->validated();
        $rs = $this->technologyRepository->deleteTechnology($data['id']);

        return redirect()->route('technology.home')->with('success', __('messages.technology.technology_deleted'));
    }
}
