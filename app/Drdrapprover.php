<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drdrapprover extends Model
{
    protected $fillable = [
    	'remarks',
    	'date_approved',
    	'attach_file',
    	'date_effective',
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
