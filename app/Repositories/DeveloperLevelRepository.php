<?php

namespace App\Repositories;

use App\Models\DeveloperLevel;

class DeveloperLevelRepository
{

    public function __construct()
    {
    }

    public function createLevel(array $data): DeveloperLevel
    {
        $level = DeveloperLevel::query()->create($data);

        return $level->refresh();
    }

    public function getAllLevel()
    {
        $levels = DeveloperLevel::query()->get();

        return $levels;
    }

    public function getLevelById($id)
    {
        $level = DeveloperLevel::query()
                        ->where('id', $id)
                        ->first();
        
        return $level;
    }

    public function updateLevel($id, array $data)
    {
        $rs = DeveloperLevel::query()
                ->where('id', $id)
                ->update($data);

        
        return $rs;
    }

    public function deleteLevel($id)
    {
        $rs = DeveloperLevel::query()
                ->where('id', $id)
                ->delete();
        
        return $rs;
    }

}
