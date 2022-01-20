<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    const CITY_TABLE_HEADER = ['name' => 'Nombre', 'description' => 'Descripcion'];
}
