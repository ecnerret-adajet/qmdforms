<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class Ncnapprover extends Model
{

    use Notifiable;
    
    protected $fillable = [
        'name',
        'position',
    	'action_taken',
        'remarks',
    	'date_approval'
    ];

    protected $dates = [
    	'date_approval'
    ];

    /**
     * configure date attibute
     */
    public function setDateApprovalAttribute($date)
    {
    	$this->attributes['date_approval'] = Carbon::parse($date);
    }

    public function getDateApprovalAttribute($date)
    {
    	return Carbon::parse($date);
    }

    /**
     * connect to ncnform model
     */
    public function ncnform()
    {
        return $this->belongsTo('App\Ncnform');
    }

    /**
     * connect to user model
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /**
     * list user model
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function getUserListAttribute()
    {
        return $this->users->pluck('id')->all();
    }

    /**
     * Status model
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
