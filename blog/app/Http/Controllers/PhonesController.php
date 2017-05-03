<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;

use prueba_laravel\Http\Requests;

use prueba_laravel\Http\Requests\PhoneRequest;

use prueba_laravel\User;
use prueba_laravel\Phone;

use Illuminate\Support\Facades\DB;

use Laracast\Flash\Flash;

class PhonesController extends Controller
{
    public function destroy($user_id,$phone_id)
    {
        $user=User::find($user_id);
        $phone=Phone::find($phone_id);
        $phone->delete();
        flash('El numero '.$phone->number.' de '.$user->name.' '.$user->lastname.' se ha eliminado con exito!', 'warning');
        return redirect()->route('admin.phones.index',$user);
    }

    public function create($user_id)
    {
        $user=User::find($user_id);
        return view('admin.users.phones.create')->with('user',$user);
    }

    public function store(PhoneRequest $request,$id)
    {
        $user=User::find($id);
        $phone=new Phone($request->all());
        $phone->user_id=$user->id;
        $phone->save();
        flash('Se ha registrado el numero de celular a '. $user->name.' '.$user->lastname.' con exito!', 'warning');
        return redirect()->route('admin.phones.index',$user);
    }
        

    public function index($id)
    {
        $user=User::find($id);
        $my_phones=$user->phones;
        return view('admin.users.phones.index')->with('user',$user)->with('my_phones',$my_phones);
    }

    public function edit($user_id,$phone_id)
    {
        $user=User::find($user_id);
        $phone=Phone::find($phone_id);
        return view('admin.users.phones.edit')->with('user',$user)
                                                ->with('phone',$phone);
    }

    public function update(Request $request,$user_id,$phone_id)
    {
        $user=User::find($user_id);
        $phone=Phone::find($phone_id);
        $phone->fill($request->all());
        $phone->save();
        flash('El numero '.$phone->number.' de '.$user->name.' '.$user->lastname.' se ha modificado con exito!', 'warning');
        return redirect()->route('admin.phones.index',$user);
    }
}
