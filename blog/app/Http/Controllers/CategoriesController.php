<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use prueba_laravel\Http\Requests;

use prueba_laravel\Category;

use Laracast\Flash\Flash;

use prueba_laravel\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    public function index()
    {
    	$categories= Category::orderBy('id','ASC')->paginate(5);
    	return view('admin.categories.index')->with('categories',$categories);
    }

    public function create()
    {
    	return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();

        try 
        {
    	$category=new Category($request->all());
    	$category->save();

        DB::commit();

    	flash('La categoria '.$category->name.' se ha registrado con exito!', 'success');
    	return redirect()->route('admin.categories.index');
        }
        catch(\Exception $e)
        {
            flash('La categoria NO se ha registrado!', 'warning');      
        return redirect()->route('admin.categories.index');
            DB::rollback();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try 
        {
    	$category=Category::find($id);
    	$category->delete();

         DB::commit();

    	flash('La Categoria '.$category->name.' se ha eliminado con exito!', 'success');
    	return redirect()->route('admin.categories.index');
        }
        catch(\Exception $e)
        {
            flash('La categoria NO se ha eliminado!', 'warning');      
        return redirect()->route('admin.categories.index');
            DB::rollback();
        }
    }

    public function edit($id)
    {
    	$category=Category::find($id);
    	return view('admin.categories.edit')->with('category',$category);
    }

    public function update(Request $request,$id)
    {
        DB::beginTransaction();

        try 
        {
        $category=Category::find($id);
        $category->fill($request->all());
        $category->save();

        DB::commit();

        flash('La categoria '.$category->name.' se ha modificado con exito!', 'success');
        return redirect()->route('admin.categories.index');
        }
        catch(\Exception $e)
        {
            flash('La categoria NO se ha modificado!', 'warning');      
        return redirect()->route('admin.categories.index');
            DB::rollback();
        }
    }
}
