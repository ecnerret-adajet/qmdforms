<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Ncnform extends Model
{

    use Notifiable;
    use SoftDeletes;
    
    protected $fillable = [
    	'name',
    	'position',
    	'notif_number',
        'recurrence_no',
    	'date_issuance',
    	'issued_by',
    	'issued_position',

        'customer_returns',
        'process_related',
        'contracted_services',
        'objective_not_met',
        'vendor',
        'others',
        
    	'details_non_conformity',
    	'attach_file',
        'active',
    ];

    protected $dates = [
    	'date_approved',
    	'date_execution',
        'deleted_at'
    ];

    /**
     * user model 
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }


    /**
     * connect to ncnapprover
     */
    public function ncnapprovers()
    {
        return $this->hasMany('App\Ncnapprover');
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


    // /**
    //  * nonconformity model
    //  */
    // public function nonconformities()
    // {
    // 	return $this->belongsToMany('App\Nonconformity')->withTimestamps();
    // }

    // public function getNonconformityListAttribute()
    // {
    // 	return $this->nonconformities->pluck('id')->all();
    // }

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


    /**
     * For notified person's data
     */
    public function ncnnotifieds()
    {
        return $this->hasMany('App\Ncnnotified');
    }    

}
