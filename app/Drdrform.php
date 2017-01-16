<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Drdrform extends Model
{
    protected $fillable = [
    	'drdr_no',
    	'document_title',
    	'revision_number',
    	'reason_request',
    	'attach_file',
    	'date_review' //date
    	'date_request' //date
    	'date_approved' //date
    	'date_mr' //date
    	'date_effective' //date
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
     * Link to status model
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
    public function setDateReviewAttribute($date)
    {
    	$this->attributes['date_review'] = Carbon::parse($date);
    }

    public function getDateReviewAttribute($date)
    {
    	return Carbon::parse($date);
    }

    public function setDateRequestAttribute($date)
    {
    	$this->attributes['date_request'] = Carbon::parse($date);
    }

    public function getDateRequestAttribute($date)
    {
    	return Carbon::parase($date);
    }

    public function setDateApprovedAttribute($date)
    {
    	$this->attributes['date_approved'] = Carbon::parse($date);
    }

    public function getDateApprovedAttribute($date)
    {
    	return Carbon::parse($date);
    }

    public function setDateMrAttribute($date)
    {
    	$this->attributes['date_mr'] = Carbon::parse($date);
    }

    public function getDateMrAttribute($date)
    {
    	return Carbon::parse($date);
    }


    public function setDateEffectiveAttribute($date)
    {
    	$this->attributes['date_effective'] = Carbon::parse($date);
    }

    public function getDateEffectiveAttribute($date)
    {
    	return Carbon::parse($date);
    }


}
