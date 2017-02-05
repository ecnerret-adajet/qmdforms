<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Drdrapprover extends Model
{

  use Notifiable;
  
    protected $fillable = [
    	'remarks',
    	'date_approved',
    	'attach_file',
    	'date_effective',
      'name',
      'position'
    ];

   protected $dates = [
   		'date_effective',
   		'date_approved'
   ];

   /**
    * user model
    */
   public function user()
   {
   		return $this->belongsTo('App\User');
   }

    /**
     * configure date
     */
    public function setDateEffectiveAttribute($date)
    {
      $this->attributes['date_effective'] = Carbon::parse($date);
    }

    public function getDateEffectiveAttribute($date)
    {
      return Carbon::parse($date);
    }


    public function setDateApprovedAttribute($date)
    {
      $this->attributes['date_approved'] = Carbon::parse($date);
    }

    public function getDateApprovedAttribute($date)
    {
      return Carbon::parse($date);
    }

   /**
    * drdrforms model
    */
   public function drdrform()
   {
      return $this->belongsTo('App\Drdrform');
   }

   /**
    * link with status model
    */
   public function statuses()
   {
   		return $this->belongsToMany('App\Status')->withTimestamps();
   }

   public function getStatusListAttribute()
   {
   		return $this->statuses->pluck('id')->all();
   }

}
