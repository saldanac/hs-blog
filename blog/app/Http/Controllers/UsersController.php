<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use prueba_laravel\Http\Requests;

use prueba_laravel\Http\Requests\UserRequest;

use prueba_laravel\User;
use prueba_laravel\Country;

use Laracast\Flash\Flash;



class UsersController extends Controller
{
    public function index()
    {
    	$users= User::orderBy('id','ASC')->paginate(5);
        $users->each(function($users){
            $users->country;
        });
    	return view('admin.users.index')->with('users',$users);
    }

    public function create()
    {
        $countries=Country::orderBy('name','ASC')->lists('name','id');
    	return view('admin.users.create')->with('countries',$countries);
    }

    public function store(UserRequest $request)
    {
    	$user=new User($request->all());
    	$user->password=bcrypt($request->password);
    	$user->save();
    	flash('El usuario '.$user->username.' se ha registrado con exito!', 'success');
    	return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
    	$user=User::find($id);
    	$user->delete();
    	flash('El usuario '.$user->username.' se ha eliminado con exito!', 'warning');
    	return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
    	$user=User::find($id);
        $countries=Country::orderBy('name','ASC')->lists('name','id');
    	return view('admin.users.edit')->with('user',$user)->with('countries',$countries);;
    }

    public function update(Request $request,$id)
    {
        $user=User::find($id);
        $user->fill($request->all());
        $user->save();
        flash('El usuario '.$user->username.' se ha modificado con exito!', 'warning');
        return redirect()->route('admin.users.index');
    }

}
