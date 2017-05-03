<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use prueba_laravel\Http\Requests;

use prueba_laravel\Article;
use prueba_laravel\subCategory;
use prueba_laravel\Tag;
use prueba_laravel\Image;

use Illuminate\Support\Facades\Redirect;

use Laracast\Flash\Flash;

use prueba_laravel\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{

	public function index(Request $request)
	{
        $articles= Article::Search($request->title)->orderBy('id','DESC')->paginate(5);
        $articles->each(function($articles){
            $articles->subcategory;
            $articles->user;
        });
		return view('admin.articles.index')->with('articles',$articles);
	}

    public function create()
    {
    	$subcategories=subCategory::orderBy('name','ASC')->lists('name','id');
    	$tags=Tag::orderBy('name','ASC')->lists('name','id');
    	return view('admin.articles.create')->with('subcategories',$subcategories)->with('tags',$tags);
    }

    public function store(ArticleRequest $request)
    {
    	//Manipulacion de Imagenes

        DB::beginTransaction();

        try 
        {
    	if($request->file('image'))
    	{
    		$file=$request->file('image');
    		$name='proyecto'.time().'.'.$file->getClientOriginalExtension();
    		$path=public_path(). '/images/articles/';
    		$file->move($path,$name);
    	}

    	$article=new Article($request->all());
    	$article->user_id=\Auth::user()->id;
    	$article->save();

    	$article->tags()->sync($request->tags);

    	$image=new Image();
    	$image->name=$name;
    	$image->article()->associate($article);
    	$image->save();

        DB::commit();

    	flash('El articulo '.$article->title.' se ha registrado con exito!', 'success');      
        return redirect()->route('admin.articles.index');
        }
        catch(\Exception $e)
        {
            flash('El articulo NO se ha registrado!', 'warning');      
        return redirect()->route('admin.articles.index');
            DB::rollback();
        }
    }

    public function edit($id)
    {
        
        $article=Article::find($id);
        $tags=Tag::orderBy('name','DESC')->lists('name','id');
        $subcategories=subCategory::orderBy('name','DESC')->lists('name','id');

        $my_tags=$article->tags->lists('id')->ToArray();

        return view('admin.articles.edit')  ->with('subcategories',$subcategories)
                                            ->with('article',$article)
                                            ->with('tags',$tags)
                                            ->with('my_tags',$my_tags);
    }

    public function update(Request $request,$id)
    {
        DB::beginTransaction();

        try 
        {
        $article=Article::find($id);
        $article->fill($request->all());
        $article->slug=null;
        $article->update(['title' => $request->title]);
        $article->save();

        $article->tags()->sync($request->tags);

         DB::commit();
        flash('El Articulo '.$article->name.' se ha modificado con exito!', 'warning');
        return redirect()->route('admin.articles.index');
        }
        catch(\Exception $e)
        {
            flash('El Articulo NO se ha modificado!', 'warning');      
        return redirect()->route('admin.articles.index');
            DB::rollback();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try 
        {
        $article=Article::find($id);
        $article->delete();

         DB::commit();
        flash('El articulo '.$article->title.' se ha eliminado con exito!', 'success');
        return redirect()->route('admin.articles.index');
        }
        catch(\Exception $e)
        {
            flash('El Articulo NO se ha eliminado!', 'warning');      
        return redirect()->route('admin.articles.index');
            DB::rollback();
        }
    }
}
