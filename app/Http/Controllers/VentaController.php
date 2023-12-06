<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return view('Ventas.index');
        }else{
            return redirect()->to('/');
        }
    }
}
