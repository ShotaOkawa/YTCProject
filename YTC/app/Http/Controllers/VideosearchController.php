<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;

class VideosearchController extends Controller
{
    public function index (Request $request) 
    {
        //ログインせずにアクセスした場合にログイン画面に遷移
        if(!$this->loginchk($request)){
            return redirect('/login')->with('loginmsg', 'ログインしてください');
        }
        $data = [];
        //Viewに値を返す
        return view('videosearch.index',["result"=>$data]);
    }

    public function search (Request $request) 
    {
        $video_id = $request->video_id;
        $video_title = $request->video_title;
        $start_date = $request->start_date;
        $end_date = $request->end_date;


        $query = Video::query();
        if(!empty($video_id)) {
            $query->where('video_id', '=', $video_id);
        }
        if(!empty($video_title)) {
            $query->where('video_title', 'like', '%'.$video_title.'%');
        }
        if((!empty($start_date))&&(!empty($end_date))) {
            $query->whereBetween('create_date', [$start_date, $end_date]);
        }
        $data = $query->get();  

        // $md = new Video();
        // $data = $md->search($video_id,$video_title,$start_date,$end_date);
        
        //Viewに値を返す
        return view('videosearch.index',["result"=>$data]);
    }

    //ログイン時のセッションの有無を判断
    function loginchk ($request) {
        if ($request->session()->exists('login')) {
            return true;
        }
        return false;
    }
}
