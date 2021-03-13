<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginchkController extends Controller
{
    public function index (Request $request) 
    {
        $username = $request->username;
        $pass = $request->password;
        $md = new User();
        $data = $md->getData($username,$pass);
        if(count($data)){
            $request->session()->put('login', 'OK');
            return redirect('/videolist');
        }else{
            return redirect('/login')->with('loginmsg', 'ユーザ名もしくはパスワードが違います');
        }
        
    }
}
