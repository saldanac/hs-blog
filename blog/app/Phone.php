<?php

namespace prueba_laravel;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table='phones';

    protected $fillable=['number','user_id'];

    public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo('prueba_laravel\User');
    }

    public function scopeSearchPhone($query,$number)
    {
        return $query->where('number','=',$number);
    }
}
