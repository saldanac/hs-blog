<?php

namespace prueba_laravel;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table='tags';

    protected $fillable=['name'];

    public $timestamps = false;

    public function articles()
    {
        return $this->belongsToMany('prueba_laravel\Article');
    }

    public function scopeSearch($query,$name)
    {
    	return $query->where('name','LIKE',"%$name%");
    }

    public function scopeSearchTag($query,$name)
    {
        return $query->where('name','=',$name);
    }
}
