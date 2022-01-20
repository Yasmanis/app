<?php

namespace App\Http\Repository;

class CityRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = \App\Models\City::class;
    }

    public function count()
    {
        return $this->model::count();
    }

    public function all()
    {
        return $this->model::all();
    }

    public function getCityWithProvince()
    {
        $collection = collect($this->model::get()->pluck('name', 'province_name'));
        return $collection->map(function ($item, $key) {
            return [$item . ', ' . $key];
        })->flatten(1)->values();
    }

    public function table_headers()
    {
        return $this->model::CITY_TABLE_HEADER;
    }

    public function create($input){
        return $this->model::create($input);
    }

    public function updateProvinceRelation($city_id, $province_id)
    {
        return $this->model::findOrFail($city_id)->update(['province_id' => $province_id]);
    }
}
