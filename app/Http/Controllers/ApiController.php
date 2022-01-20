<?php

namespace App\Http\Controllers;

use App\Http\Repository\CityRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function getCity(){
        return $this->cityRepository->getCityWithProvince();
    }
}
