<?php

namespace prueba_laravel;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';

    protected $fillable=['user_id'];

    public function user()
    {
        return $this->belongsTo('prueba_laravel\User');
    }

    public function articles()
    {
        return $this->belongsToMany('prueba_laravel\Article','article_comment','article_id','comment_id')->withPivot('comment');
    }
}
