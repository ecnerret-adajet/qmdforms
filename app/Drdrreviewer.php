<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Drdrreviewer extends Model
{

    use Notifiable;
    
    protected $fillable = [
    	'attach_file', // draft for approval
    	'date_review',
      'remarks',
      'consider_document',
      'name',
      'position'
    ];

    protected $dates = [
    	'date_review'
    ];

    /**
     * current auth user
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
     * link users model
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
     * link status model
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
     * configure date
     */
    public function setDateReviewAttribute($date)
    {
    	$this->attributes['date_review'] = Carbon::parse($date);
    }

    public function getDateReviewAttribute($date)
    {
    	return Carbon::parse($date);
    }


}
