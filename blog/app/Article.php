<?php

namespace prueba_laravel;

use Illuminate\Database\Eloquent\Model;

// Sluggable agregado

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Article extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table='articles';

    protected $fillable=['title','content','subcategory_id','user_id'];

    public function user()
    {
        return $this->belongsTo('prueba_laravel\User');
    }

    public function subcategory()
    {
    	return $this->belongsTo('prueba_laravel\subCategory','subcategory_id');
    }

    public function images()
    {
        return $this->hasMany('prueba_laravel\Image');
    }

    public function tags()
    {
        return $this->belongsToMany('prueba_laravel\Tag');
    }

    public function scopeSearch($query,$title)
    {
        return $query->where('title','LIKE',"%$title%");
    }

    public function comments()
    {
        return $this->belongsToMany('prueba_laravel\Comment','article_comment','article_id','comment_id')->withPivot('comment');
    }
}
