<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nonconformity extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function ncnforms()
    {
    	return $this->belongsToMany('App\Ncnform');
    }
}
