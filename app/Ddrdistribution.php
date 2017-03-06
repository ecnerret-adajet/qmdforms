<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ddrdistribution extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function ddrforms()
    {
    	return $this->belongsToMany('App\Ddrform');
    }
}
