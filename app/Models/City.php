<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['province_name'];

    const CITY_TABLE_HEADER = ['name' => 'Nombre', 'description' => 'Descripción', 'province_name' => 'Provincia'];

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function getProvinceNameAttribute(){
        return $this->province->name ?? '';
    }
}
