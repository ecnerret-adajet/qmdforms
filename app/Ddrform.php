<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ddrform extends Model
{
	protected $fillable = [
		'ddr_no',
		'reason_distribution',
		'date_needed',
		'date_requested',
		'date_approval',
	];

	protected $dates = [
		'date_needed',
		'date_requested',
		'date_approval'
	];

	/**
	 * connect to user's model
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * connect ddrlist model
	 */
	public function ddrlists()
	{
		return $this->hasMany('App\Ddrlist');
	}

	/**
	 * connect to department
	 */

	public function departments()
	{
		return $this->belongsToMany('App\Department')->withTimestamps();
	}

	public function getDepartmentListAttribute()
	{
		return $this->departments->pluck('id')->all();
	}

	/**
	 * link to status model
	 */
	public function statuses()
	{
		return $this->belongsToMany('App\Status')->withTimestamps();
	}

	public function getStatusListAttribute()
	{
		return $this->statuses->pluck('id')->all();
	}





}
