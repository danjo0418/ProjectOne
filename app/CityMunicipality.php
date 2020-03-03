<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityMunicipality extends Model
{
    protected $table = 'city_municipality';
    protected $fillable = ['province_id','city_municipality'];
}
