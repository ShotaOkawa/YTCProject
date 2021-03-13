<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index (Request $request) 
    {
        if ($request->session()->exists('login')) {
            $request->session()->forget('login');
        }
        return view('login.index');
    }
    
}
