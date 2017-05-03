<?php

namespace prueba_laravel;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='images';

    protected $fillable=['name','article_id'];

    public $timestamps = false;

    public function article()
    {
    	return $this->belongsTo('prueba_laravel\Article');
    }
}
