<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ddrlist extends Model
{
    protected $fillable = [
    	'document_title',
    	'control_code',
    	'copy_no',
    	'copy_holder',
    	'recieved_by',
    	'date_list',
    ];

    protected $dates = [
    	'date_list'
    ];

    /**
     * connect to ddrforms model
     */
    public function ddrform()
    {
    	return $this->belongsTo('App\Ddrform');
    }

    /**
     * date configuration
     */
    // public function setDateListAttribute($date)
    // {
    // 	$this->attributes['date_list'] = Carbon::parse($date);
    // }

    // public function getDateListAttribute($date)
    // {
    // 	return Carbon::parse($date);
    // }

}
