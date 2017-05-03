<?php

namespace prueba_laravel;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';

    protected $fillable = ['username','name','lastname', 'email', 'password','type','country_id'];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany('prueba_laravel\Article');
    }

    public function country()
    {
        return $this->belongsTo('prueba_laravel\Country');
    }

    public function phones()
    {
        return $this->hasMany('prueba_laravel\Phone');
    }

    public function admin()
    {
        return $this->type ==='admin';
    }

    public function comments()
    {
        return $this->hasMany('prueba_laravel\Comment');
    }
}
