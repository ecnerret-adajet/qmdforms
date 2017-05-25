<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Drdrform extends Model
{

     use Notifiable;
     use SoftDeletes;

    protected $fillable = [
    	'document_title',
        'reason_request',
    	'revision_number',
    	'attach_file',
        'active',
        'name',
        'position',
    	'date_request' //date
    ];

    protected $dates = [
    	'date_review',
        'deleted_at'
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
    	return Carbon::parse($date);
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
     * For management review approval
     */
    public function drdrmrs()
    {
        return $this->hasMany('App\Drdrmr');
    }

}
