<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ncnnotified extends Model
{
    protected $fillable = [
    	'name', // notified person's name
    	'position', 
    	'action_taken',
    	'responsible',
    	'execution_date'
    ];

    protected $dates = [
    	'execution_date'
	];

	public function ncnform()
	{
		return $this->belongsTo('App\Ncnform');
	}

	/**
	 * configure date 
	 */

	public function setExecutionDateAttribute($date)
	{
		$this->attributes['execution_date'] = Carbon::parse($date);
	}

	public function getExecutionDateAttribute($date)
	{
		return Carbon::parse($date);
	}


}
