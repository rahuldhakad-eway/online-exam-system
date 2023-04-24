<?php

namespace App\Repositories;

use App\Models\Technology;

class TechnologyRepository
{

    public function __construct()
    {
    }

    public function createTechnology(array $data): Technology
    {
        $technology = Technology::query()->create($data);

        return $technology->refresh();
    }

    public function getAllTechnology()
    {
        $technologies = Technology::query()->get();

        return $technologies;
    }

    public function getTechnologyById($id)
    {
        $technology = Technology::query()
                        ->where('id', $id)
                        ->first();
        
        return $technology;
    }

    public function updateTechnology($id, array $data)
    {
        $rs = Technology::query()
                ->where('id', $id)
                ->update($data);

        
        return $rs;
    }

    public function deleteTechnology($id)
    {
        $rs = Technology::query()
                ->where('id', $id)
                ->delete();
        
        return $rs;
    }

}
