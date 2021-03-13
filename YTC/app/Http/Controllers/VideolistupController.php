<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Analysis_video;

use App\Http\Controllers\Controller;
use Google_Client;
use Google_Service_YouTube;

class VideolistupController extends Controller
{
    public function index (Request $request) 
    {
        //ログインせずにアクセスした場合にログイン画面に遷移
        if(!$this->loginchk($request)){
            return redirect('/login')->with('loginmsg', 'ログインしてください');
        }

        //analysis_videoからデータを取得
        $md = new Analysis_video();
        $data = $md->getData();
        //URLを作成する
        
        //Viewに値を返す
        return view('videolistup.index',["videos"=>$data]);
    }

    public function videoiddel (Request $request) 
    {
        //分析動画IDを削除する
        $md = new Analysis_video();
        $md->where('video_id', $request->video_id)->delete();
        $data = $md->getData();
        
        //Viewに値を返す
        return view('videolistup.index',["videos"=>$data]);
    }


    public function videoidins (Request $request) 
    {
        if(!$this->video_exsist_chk($request->video_id)){
            return redirect('/videolistup')->with('videoidins_msg', '動画IDがYouTubeに存在しません');
        }
        $md = new Analysis_video();
        $md->videoidins($request->video_id);
        
        //Viewに値を返す
        return redirect('/videolistup');
    }

    //ログイン時のセッションの有無を判断
    function loginchk ($request) {
        if ($request->session()->exists('login')) {
            return true;
        }
        return false;
    }

    function video_exsist_chk($video_id){
        $client = new Google_Client();
        //YOUTUBE APIKEYを下記にセットする
        $client->setDeveloperKey('');

        $youtube = new Google_Service_YouTube($client);

        $items = $youtube->videos->listVideos('snippet',array('id' => $video_id));
        if(count($items)>0){
            return true;
        }else{
            return false;
        }
    }
}
