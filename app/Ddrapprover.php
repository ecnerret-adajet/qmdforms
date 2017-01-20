<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Ddrapprover extends Model
{

    use Notifiable;
    
    protected $fillable = [
    	'name',
    	'position',
        'remarks',
    	'date_approved',
    ];

    protected $dates = [
    	'date_approved'
    ];

    /**
     * configure date
     */
	public function setDateApprovedAttribute($date)
	{
		$this->attributes['date_approved'] = Carbon::parse($date);
	}

	public function getDateApprovedAttribute($date)
	{
		return Carbon::parse($date);
	}

    /**
     * user model
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    /**
     * ddrform model
     */
    public function ddrform()
    {
    	return $this->belongsTo('App\Ddrform');
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
