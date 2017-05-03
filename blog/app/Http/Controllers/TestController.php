<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;

use prueba_laravel\Http\Requests;

use prueba_laravel\Http\Controllers\Controller;

use prueba_laravel\Article;

class TestController extends Controller
{
    public function view ($id)
    {
    	$article=Article::find($id);
    	$article->category;
    	$article->user;
    	$article->tags;
    	return view('Test.index',['article'=>$article]);
    }
}
