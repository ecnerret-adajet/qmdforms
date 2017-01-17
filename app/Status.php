<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function drdrreviewers()
    {
    	return $this->belongsToMany('App\drdrreviewer');
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
