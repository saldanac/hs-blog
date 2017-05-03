<?php

namespace prueba_laravel;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    protected $fillable=['name','description'];

    public $timestamps = false;

    public function subcategories()
    {
    	return $this->hasMany('prueba_laravel\subCategory');
    }

    public function scopeSearchCategory($query,$name)
    {
        return $query->where('name','=',$name);
    }
}
