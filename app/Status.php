<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function drdrforms()
    {
    	return $this->belongsToMany('App\Drdrform');
    }

    public function ddrforms()
    {
    	return $this->belongsToMany('App\Ddrform');
    }

    public function ncnforms()
    {
    	return $this->belongsToMany('App\Ncnform');
    }

}
