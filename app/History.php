<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $fillable = ['user_id', 'description'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
