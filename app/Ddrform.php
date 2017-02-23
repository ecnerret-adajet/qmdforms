<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Ddrform extends Model
{

	use Notifiable;
	use SoftDeletes;
	
	protected $fillable = [
		'ddr_no',
		'name',
		'position',
		'date_needed',
		'relevant_external',
		'customer_request',
		'others',
		'date_requested',
		'active',
	];

	protected $dates = [
		'date_needed',
		'date_requested',
		'deleted_at',
	];

	/**
	 * connect to user's model
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

    /**
     * users list reviewer
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function getUserListAttribute()
    {
        return $this->users->pluck('id')->all();
    }

    
	/**
	 * has many ddrapprover
	 */
	public function ddrapprovers()
	{
		return $this->hasMany('App\Ddrapprover');
	}

	/**
	 * configure date
	 */
	public function setDateNeededAttribute($date)
	{
		$this->attributes['date_needed'] = Carbon::parse($date);
	}

	public function getDateNeededAttribute($date)
	{
		return Carbon::parse($date);
	}

	public function setDateRequestedAttribute($date)
	{
		$this->attributes['date_requested'] = Carbon::parse($date);
	}

	public function getDateRequestedAttribute($date)
	{
		return Carbon::parse($date);
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


	//Allow management representative to approve a form
	public function ddrmrs()
	{
		return $this->hasMany('App\Ddrmr');
	}




}
