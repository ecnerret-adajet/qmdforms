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
    	'date_issuance',
    	'issued_by',
    	'issued_position',
    	'details_non_conformity',
    	'attach_file'
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
     * users model
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
    public function setDateIssuanceAttribute($date)
    {
    	$this->attributes['date_issuance'] = Carbon::parse($date);
    }

    public function getDateIssuanceAttribute($date)
    {
    	return Carbon::parse($date);
    }


    

}
