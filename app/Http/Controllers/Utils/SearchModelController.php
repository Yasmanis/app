<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchModelController extends Controller
{
    public function getOptions(Request $request){
        $model = $request->model;
        $text = $request->text;
        $id = $request->id;
        return $model::get()->pluck($text, $id);
    }
}
