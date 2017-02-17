<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Drdrmr extends Model
{
    protected $fillable = [
        'drdr_no',
    	'document_title',
    	'document_code',
    	'revision_number',
        'verified_by',
    	'verified_date',
    ];

    protected $dates = [
    	'verified_date',
    	'effective_date'
    ];

    public function drdrform()
    {
    	return $this->belongsTo('App\Drdrform');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function getUserListAttribute()
    {
    	return $this->users->pluck('id')->all();
    }

    /**
     * configure dates
     */
    public function setVerifiedDateAttribute($date)
    {
    	$this->attributes['verified_date'] = Carbon::parse($date);
    }

    public function getVerifiedDateAttribute($date)
    {
    	return Carbon::parse($date);
    }

    public function setEffectiveDateAttribute($date)
    {
    	$this->attributes['effective_date'] = Carbon::parse($date);
    }

    public function getEffectiveDateAttribute($date)
    {
    	return Carbon::parse($date);
    }



}
