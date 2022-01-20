<?php

namespace App\Http\Controllers;

use App\Http\Repository\ProvinceRepository;
use App\Http\Requests\ProvinceRequest;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    protected $data;
    protected $provinceRepository;

    public function __construct(ProvinceRepository $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['table_header'] = json_encode($this->provinceRepository->table_headers());
        $this->data['dataTable'] = json_encode($this->provinceRepository->all());
        $this->data['base_url'] = '/provincias';
        return view('module.province.index', $this->data);
    }

    public function success($id)
    {
        return redirect()->route('provincias.index')->with(['message' => 'Provincia ' . ($id == 'null' ? 'Creada' : 'Actualizada') . ' Correctamente']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('module.province.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProvinceRequest $request
     * @return String
     */
    public function store(ProvinceRequest $request)
    {
        $this->provinceRepository->create($request);
        return '/provincias/success/null';
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['province'] = json_encode($this->provinceRepository->find($id)->with('city')->first());
        return view('module.province.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProvinceRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRequest $request, $id)
    {
        $this->provinceRepository->update($request, $id);
        return '/provincias/success/'. $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->provinceRepository->delete($id);
    }
}
