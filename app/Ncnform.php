<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ncnform extends Model
{
    protected $fillable = [
    	'issuer',
    	'position',
    	'notif_number',
    	'recurrence_no',
    	'issued_by',
    	'issued_position',
    	'details_non_conformity',
    	'attach_file',
    	'date_approved',
    	'action_taken',
    	'responsible',
    	'date_execution',
    	'attach_file_notify'
    ];

    protected $dates = [
    	'date_approved',
    	'date_execution'
    ];

    /**
     * user model 
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /**
     * company model
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
     * Department model
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


    /**
     * nonconformity model
     */
    public function nonconformities()
    {
    	return $this->belongsToMany('App\Nonconformity')->withTimestamps();
    }

    public function getNonconformityListAttribute()
    {
    	return $this->nonconformities->pluck('id')->all();
    }

    /**
     * Date configuration
     */
    public function setDateApprovedAttribute($date)
    {
    	$this->attributes['date_approved'] = Carbon::parse($date);
    }

    public function getDateApprovedAttribute($date)
    {
    	return Carbon::parse($date);
    }


    public function setDateExecutionAttribute($date)
    {
    	$this->attributes['date_execution'] = Carbon::parse($date);
    }

    public function getDateExecutionAttribute($date)
    {
    	return Carbon::parse($date);
    }
    

}
