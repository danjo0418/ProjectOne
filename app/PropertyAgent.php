<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyAgent extends Model
{
	protected $table = 'property_agent';
    protected $fillable = ['property_id','agent_id'];

    public function details()
    {
        return $this->belongsTo('App\User', 'agent_id');
    }

    public function property()
    {
    	return $this->belongsTo('App\Property', 'property_id');
    }
}
