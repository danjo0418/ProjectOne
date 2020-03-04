<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';
    protected $fillable = ['code','offer_type','type_id','status_id','name','about','bedrooms','bathrooms','floor_area','land_size','building_name','block_lotnum','developer','furnished','rooms','car_space','build_year','deposit_bond','price','price_condition','street_barangay','city_municipality','province','geographical','map','is_featured','is_approved', 'created_by'];

    public function type()
    {
        return $this->belongsTo('App\PropertyType', 'type_id');
    }

    public function status()
    {
        return $this->belongsTo('App\PropertyStatus', 'status_id');
    }

    public function thumbnail()
    {
    	return $this->hasOne('App\PropertyPhoto', 'property_id')->orderBy('id','ASC');
    }

    public function photos()
    {
        return $this->hasMany('App\PropertyPhoto', 'property_id')->orderBy('id','ASC');
    }

    public function agents()
    {
        return $this->hasMany('App\PropertyAgent', 'property_id')->orderBy('id','ASC');
    }

    public function author()
    {
        return  $this->belongsTo('App\User', 'created_by');
    }

}
