<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drdrcopyholder extends Model
{
    protected $fillable = [
    	'copy_no',
    	'copyholder'
    ];

    public function drdrapprover()
    {
    	return $this->belongsTo('App\Drdrapprover');
    }
}
