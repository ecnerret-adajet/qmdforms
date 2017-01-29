<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Ccirform extends Model
{

     use Notifiable;
     use SoftDeletes;

    protected $fillable = [
    	'name',
    	'date_issuance', // date
    	'customer_reference',
    	'brand_name',
    	'affected_quantities',
    	'product_no',
    	'date_delivery', // date
        'conduct_traceability',
        'suspected_counterfeit',
    	'verification',
    	'attach_file',
        'active',
    ];

    protected $dates = [
    	'date_issuance',
    	'date_delivery',
        'deleted_at'
    ];

    /**
     * Connect user model
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /**
     * Link company model
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
     * Set date configurations -> date_issuance
     */

    public function setDateIssuanceAttribute($date)
    {
    	$this->attributes['date_issuance'] = Carbon::parse($date);
    }

    public function getDateIssuanceAttribute($date)
    {
    	return Carbon::parse($date);
    }


    /**
     * Set date configuration -> date_delivery
     */

    public function setDateDeliveryAttribute($date)
    {
    	$this->attributes['date_delivery'] = Carbon::parse($date);
    }

    public function getDateDeliveryAttribute($date)
    {
    	return Carbon::parse($date);
    }

}