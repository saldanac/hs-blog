<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use prueba_laravel\Http\Requests;

use prueba_laravel\Http\Requests\SubCategoryRequest;

use prueba_laravel\subCategory;
use prueba_laravel\Category;

use Laracast\Flash\Flash;

class SubCategoriesController extends Controller
{
    public function index()
    {
    	$subcategories= subCategory::orderBy('id','ASC')->paginate(5);
        $subcategories->each(function($subcategories){
            $subcategories->category;
        });
    	return view('admin.subcategories.index')->with('subcategories',$subcategories);
    }

    public function create()
    {
        $categories=Category::orderBy('name','ASC')->lists('name','id');
    	return view('admin.subcategories.create')->with('categories',$categories);
    }

    public function store(SubCategoryRequest $request)
    {
    	$subcategory=new subCategory($request->all());
    	$subcategory->save();
    	flash('La subcategoria '.$subcategory->name.' se ha registrado con exito!', 'success');
    	return redirect()->route('admin.subcategories.index');
    }

    public function destroy($id)
    {
    	$subcategory=subCategory::find($id);
    	$subcategory->delete();
    	flash('La subcategoria '.$subcategory->name.' se ha eliminado con exito!', 'warning');
    	return redirect()->route('admin.subcategories.index');
    }

    public function edit($id)
    {
    	$subcategory=subCategory::find($id);
        $categories=Category::orderBy('name','ASC')->lists('name','id');
    	return view('admin.subcategories.edit')->with('subcategory',$subcategory)->with('categories',$categories);;
    }

    public function update(Request $request,$id)
    {
        $subcategory=subCategory::find($id);
        $subcategory->fill($request->all());
        $subcategory->save();
        flash('La subcategoria '.$subcategory->name.' se ha modificado con exito!', 'warning');
        return redirect()->route('admin.subcategories.index');
    }
}
