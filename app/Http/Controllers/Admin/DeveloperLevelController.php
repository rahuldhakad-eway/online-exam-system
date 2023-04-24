<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DeveloperLevelFormRequest;
use App\Http\Requests\DeleteDeveloperLevelFormRequest;
use App\Repositories\DeveloperLevelRepository;

class DeveloperLevelController extends Controller
{
    public function __construct(private DeveloperLevelRepository $developerLevelRepository) {}

    public function index()
    {
        $levels = $this->developerLevelRepository->getAllLevel();
        return view('admin.developer_level.index', compact('levels'));
    }

    public function add()
    {
        return view('admin.developer_level.add');
    }

    public function submit(DeveloperLevelFormRequest $request)
    {
        $data = $request->validated();
        $technology = $this->developerLevelRepository->createLevel($data);

        return redirect()->route('developer.level.home')->with('success', __('messages.developer_level.level_added'));
    }

    public function edit(Request $request, $id)
    {
        $level = $this->developerLevelRepository->getLevelById($id);

        return view('admin.developer_level.edit', [
            'level' => $level
        ]);
    }

    public function update(DeveloperLevelFormRequest $request, $id)
    {
        $data = $request->validated();
        $rs = $this->developerLevelRepository->updateLevel($id, $data);

        return redirect()->route('developer.level.home')->with('success', __('messages.developer_level.level_updated'));
    }

    public function delete(DeleteDeveloperLevelFormRequest $request)
    {
        $data = $request->validated();
        info($data);
        $rs = $this->developerLevelRepository->deleteLevel($data['id']);

        return redirect()->route('developer.level.home')->with('success', __('messages.developer_level.level_deleted'));
    }
}
