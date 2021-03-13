<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;

class VideolistController extends Controller
{

    public function index (Request $request) 
    {
        //ログインせずにアクセスした場合にログイン画面に遷移
        if(!$this->loginchk($request)){
            return redirect('/login');
        }

        //分析中の動画で直近の動画情報を取得
        $md = new Video();
        $data = $md->getData();
        
        //Viewに値を返す
        return view('videolist.index',["videos"=>$data]);
    }



    //ログイン時のセッションの有無を判断
    function loginchk ($request) {
        if ($request->session()->exists('login')) {
            return true;
        }
        return false;
    }

}
