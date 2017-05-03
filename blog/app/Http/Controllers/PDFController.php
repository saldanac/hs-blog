<?php

namespace prueba_laravel\Http\Controllers;

use Illuminate\Http\Request;

use prueba_laravel\Http\Requests;
use PDF;
use prueba_laravel\User;

class PDFController extends Controller
{
	public function getUsers()
	{
		$users =User::all();
		$pdf = PDF::loadView('admin.pdf.user',['users'=>$users]);
		return $pdf->stream('user.pdf');
	}
}
