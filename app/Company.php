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

    public function ncnforms()
    {
    	return $this->belongsToMany('App\Ncnform');
    }

    public function ddrforms()
    {
        return $this->belongsToMany('App\Ddrform');
    }

    /**
     * user list model
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
