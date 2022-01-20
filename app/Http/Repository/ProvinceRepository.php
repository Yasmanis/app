<?php

namespace App\Http\Repository;

class ProvinceRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = \App\Models\Province::class;
    }

    public function count()
    {
        return $this->model::count();
    }

    public function all(){
        return $this->model::all();
    }

    public function table_headers(){
        return $this->model::CITY_TABLE_HEADER;
    }
}
