<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mails extends Model
{
    protected $table = 'mails';
    protected $fillable = ['to','code','fname','lname','email','phone','title','subject','message','interested','property_sketch','property_sketch_extention','property_location','property_lotsize','property_code','appointment_date','appointment_time','is_read','is_deleted','date_sent'];

    public function toagent()
    {
    	return $this->belongsTo('App\User', 'to');
    }
}
