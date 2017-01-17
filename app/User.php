<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','form_password','positon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * ccirform model
     */
    public function ccirforms()
    {
        return $this->hasMany('App\Ccirform');
    }

    /**
     * ddrforms model
     */
    public function ddrforms()
    {
        return $this->hasMany('App\Ddrform');
    }

    public function drdrapprovers()
    {
        return $this->hasMany('App\Drdrapprovers');
    }

    public function drdrreviewers()
    {
        return $this->hasMany('App\Drdrreviewers');
    }


    /**
     * drdrforms model
     */
    public function drdrforms()
    {
        return $this->hasMany('App\Drdrform');
    }

    /**
     * ncnforms model
     */
    public function ncnforms()
    {
        return $this->hasMany('App\Ncnform');
    }



}
