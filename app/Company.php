<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function drdrforms()
    {
    	return $this->belongsToMany('App\Drdrforms');
    }

    public function ccirforms()
    {
    	return $this->belongsToMany('App\Ccirform');
    }

    public function ncnforms()
    {
    	return $this->belongsToMany('App\Ncnform');
    }
}
