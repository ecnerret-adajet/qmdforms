<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Drdrform extends Model
{
    protected $fillable = [
    	'drdr_no',
    	'document_title',
        'reason_request',
    	'revision_number',
        'requester'
    	'attach_file',
    	'date_request' //date
    ];

    protected $dates = [
    	'date_review',
    	'date_request',
    	'date_approved',
    	'date_mr',
    	'date_effective'
    ];

    /**
     * connect to user model
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /**
     * drdrreviewer model
     */
    public function drdrreviewers()
    {
        return $this->hasMany('App\Drdrreviewer');
    }


    /**
     * drdrapprover model
     */
    public function drdrapprovers()
    {
        return $this->hasMany('App\Drdrapprover');
    }

    /**
     * link company model
     */
    public function companies()
    {
    	return $this->belongsToMany('App\Company')->withTimestamps();
    }

    public function getCompanyListAttribute()
    {
    	return $this->companies->pluck('id')->all();
    }

    /**
     * link to type of request
     */
    public function types()
    {
    	return $this->belongsToMany('App\Type')->withTimestamps();
    }

    public function getTypeListAttribute()
    {
    	return $this->types->pluck('id')->all();
    }

    /**
     * list to department model
     */
    public function departments()
    {
    	return $this->belongsToMany('App\Department')->withTimestamps();
    }

    public function getDepartmentListAttribute()
    {
    	return $this->departments->pluck('id')->all('id');
    }

    /**
     * Dates configuration for drdrforms
     */
    public function setDateRequestAttribute($date)
    {
    	$this->attributes['date_request'] = Carbon::parse($date);
    }

    public function getDateRequestAttribute($date)
    {
    	return Carbon::parase($date);
    }


}
