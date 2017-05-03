<?php

namespace prueba_laravel;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='countries';

    protected $fillable=['name'];

    public $timestamps = false;

    public function users()
    {
    	return $this->hasMany('prueba_laravel\User');
    }

    public function scopeSearchCountry($query,$name)
    {
        return $query->where('name','=',$name);
    }
}
