<?php

namespace prueba_laravel;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    protected $table='subCategories';

    protected $fillable=['name','description','category_id'];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('prueba_laravel\Category');
    }

    public function scopeSearchSubCategory($query,$name)
    {
        return $query->where('name','=',$name);
    }

    public function articles()
    {
        return $this->hasMany('prueba_laravel\Article','subcategory_id');
    }
}
