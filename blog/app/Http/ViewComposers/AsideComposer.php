<?php

namespace prueba_laravel\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use prueba_laravel\subCategory;
use prueba_laravel\Category;
use prueba_laravel\Tag;

class AsideComposer
{

	public function compose(View $view)
	{
		/*$subcategories=subCategory::orderBy('name','desc')->get();

		$subcategories->each(function($subcategories){
			$subcategories->category;
		});
		dd($subcategories);*/

		$categories=Category::orderBy('name','desc')->get();

		$categories->each(function($categories){
			$categories->subcategories;
		});
		//dd($categories);


		$tags=Tag::orderBy('name','desc')->get();
		$view->with('categories',$categories)->with('tags',$tags);
	}

}