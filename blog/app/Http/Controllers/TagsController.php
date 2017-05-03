<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;

use prueba_laravel\Http\Requests;

use prueba_laravel\Tag;

use Laracast\Flash\Flash;

use prueba_laravel\Http\Requests\TagRequest;

class TagsController extends Controller
{
    public function index(Request $request)
    {
    	$tags= Tag::Search($request->name)->orderBy('id','ASC')->paginate(5);
    	return view('admin.tags.index')->with('tags',$tags);
    }

    public function create()
    {
    	return view('admin.tags.create');
    }

    public function store(TagRequest $request)
    {
    	$tag=new Tag($request->all());
    	$tag->save();
    	flash('El tag '.$tag->name.' se ha registrado con exito!', 'success');
    	return redirect()->route('admin.tags.index');
    }

    public function destroy($id)
    {
    	$tag=Tag::find($id);
    	$tag->delete();
    	flash('El tag '.$tag->name.' se ha eliminado con exito!', 'warning');
    	return redirect()->route('admin.tags.index');
    }

    public function edit($id)
    {
    	$tag=Tag::find($id);
    	return view('admin.tags.edit')->with('tag',$tag);
    }

    public function update(Request $request,$id)
    {
        $tag=Tag::find($id);
        $tag->fill($request->all());
        $tag->save();
        flash('El tag '.$tag->name.' se ha modificado con exito!', 'warning');
        return redirect()->route('admin.tags.index');
    }
}
