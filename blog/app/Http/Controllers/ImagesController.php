<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;

use prueba_laravel\Http\Requests;

use prueba_laravel\Image;

class ImagesController extends Controller
{
    public function index()
    {
    	$images= Image::all();

    	$images->each(function($images){
    		$images->article;
    	});
    	
    	return view('admin.images.index')->with('images',$images);
    }
}
