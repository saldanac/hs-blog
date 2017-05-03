<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;

use prueba_laravel\Http\Requests;

use prueba_laravel\Article;
use prueba_laravel\subCategory;
use prueba_laravel\Tag;

use Carbon\Carbon;

class FrontController extends Controller
{

	public function __construct()
	{
		Carbon::setLocale('es');
	}

	public function index()
	{
		$articles=Article::orderBy('id','DESC')->paginate(4);
		$articles->each(function($articles){
			$articles->images;
			//$articles->subcategory;
			$articles->subcategory->category;
		});

		//dd($articles);
		return view('front.index')
			->with('articles',$articles);
	}

	public function searchSubCategory($name)
	{
		$subcategory=subCategory::SearchSubCategory($name)->first();
		$articles=$subcategory->articles()->paginate(4);
		$articles->each(function($articles){
			$articles->images;
			$articles->subcategory;
		});
		return view('front.index')
			->with('articles',$articles);
	}

	public function searchTag($name)
	{
		$tag=Tag::SearchTag($name)->first();
		$articles=$tag->articles()->paginate(4);
		$articles->each(function($articles){
			$articles->images;
			$articles->subcategory;
		});
		return view('front.index')
			->with('articles',$articles);
	}

	public function viewArticle($slug)
	{
		$article=Article::findBySlugOrFail($slug);
		$article->subcategory;
		$article->user;
		$article->tags;
		$article->images;

		$my_comments=$article->comments;
		$my_comments->each(function($my_comments){
			$my_comments->user;
		});

		$articles=Article::orderBy('title','ASC')->lists('title','id');
		
		return view('front.article')->with('article',$article)->with('my_comments',$my_comments)->with('articles',$articles);
	}

}
