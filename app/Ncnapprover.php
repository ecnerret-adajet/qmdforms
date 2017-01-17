<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ncnapprover extends Model
{
    protected $fillable = [
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
