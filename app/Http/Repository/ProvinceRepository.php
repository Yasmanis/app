<?php

namespace App\Http\Repository;

class ProvinceRepository
{
    protected $model;
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->model = \App\Models\Province::class;
        $this->cityRepository = $cityRepository;
    }

    public function count()
    {
        return $this->model::count();
    }

    public function all()
    {
        return $this->model::all();
    }

    public function find($id)
    {
        return $this->model::findOrFail($id);
    }

    public function table_headers()
    {
        return $this->model::CITY_TABLE_HEADER;
    }

    public function single_relations()
    {
        return $this->model::SINGLE_RELATION;
    }

    public function create($request)
    {
        $single_relation = $this->single_relations();
        $input = $request->except($single_relation);
        $model = $this->model::create($input);
        $this->cityRepository->updateProvinceRelation($request->city, $model->id);
        return $model;
    }

    public function update($request, $id)
    {
        $single_relation = $this->single_relations();
        $input = $request->except($single_relation);
        $model = $this->find($id);
        $model->update($input);
        $model->city()->update(['province_id' => null]);
        $this->cityRepository->updateProvinceRelation($request->city, $model->id);
    }

    public function delete($id){
        return $this->find($id)->delete();
    }
}
