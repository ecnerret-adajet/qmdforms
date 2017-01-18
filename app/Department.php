<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
    	'name'
    ];

    /**
     * connect to ddrforms
     */
    public function  ddrforms()
    {
    	return $this->belongsToMany('App\Ddrform');
    }

    /**
     * connect to drdrforms
     */
    public function drdrforms()
    {
    	return $this->belongsToMany('App\Drdrform');
    }

    /**
     * user list model
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}

