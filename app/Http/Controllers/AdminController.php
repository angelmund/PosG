<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;



class AdminController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $users = User::all();
            return View::make('Admin.index', compact('users'));
        }else{
            return redirect()->to('/');
        }
        
    }

}
