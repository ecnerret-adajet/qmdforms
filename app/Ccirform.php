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
        'position',
    	'company',
    	'date_issuance', // date
    	// 'customer_reference',
        'complaint_name',
    	'brand_name',
        'affected_quantities',
    	'quantity_received',
    	'product_no',
        'date_delivery', // date
    	'return_date', // date
        // 'conduct_traceability',
        // 'suspected_counterfeit',
    	// 'verification',
        'wet_lumpy',
        'busted_bag',
        'under_over_weight',
        'infested',
        'dirty_package',
        'others',
    	'attach_file',
        'active',
    ];

    protected $dates = [
    	'date_issuance',
    	'date_delivery',
        'return_date',
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

    /**
     * Set date configuration -> date_delivery
     */

    public function setReturnDateAttribute($date)
    {
        $this->attributes['return_date'] = Carbon::parse($date);
    }

    public function getReturnDateAttribute($date)
    {
        return Carbon::parse($date);
    }

}