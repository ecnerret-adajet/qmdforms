<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ddrmr extends Model
{
    protected $fillable = [
    	'name',
    	'position',
    	'verified_date'
    ];

    protected $dates = [
    	'verified_date'
    ];

    public function setVerifiedDateAttribute($date)
    {
    	$this->attributes['verified_date'] = Carbon::parse($date);
    }

    public function getVerifiedDateAttribute($date)
    {
    	return Carbon::parse($date);
    }

    //connect to main ddr form;
    public function ddrform()
    {
    	return $this->belongsTo('App\Ddrform');
    }

}



