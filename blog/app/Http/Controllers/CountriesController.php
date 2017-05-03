<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;

use prueba_laravel\Http\Requests;

use prueba_laravel\Country;

use Laracast\Flash\Flash;

use prueba_laravel\Http\Requests\CountryRequest;

class CountriesController extends Controller
{
    public function index()
    {
    	$countries= Country::orderBy('id','ASC')->paginate(5);
    	return view('admin.countries.index')->with('countries',$countries);
    }

    public function create()
    {
    	return view('admin.countries.create');
    }

    public function store(CountryRequest $request)
    {
    	$country=new Country($request->all());
    	$country->save();
    	flash('El pais '.$country->name.' se ha registrado con exito!', 'success');
    	return redirect()->route('admin.countries.index');
    }

    public function destroy($id)
    {
    	$country=Country::find($id);
    	$country->delete();
    	flash('El pais '.$country->name.' se ha eliminado con exito!', 'success');
    	return redirect()->route('admin.countries.index');
    }

    public function edit($id)
    {
    	$country=Country::find($id);
    	return view('admin.countries.edit')->with('country',$country);
    }

    public function update(Request $request,$id)
    {
        $country=Country::find($id);
        $country->fill($request->all());
        $country->save();
        flash('El pais '.$country->name.' se ha modificado con exito!', 'success');
        return redirect()->route('admin.countries.index');
    }
}
