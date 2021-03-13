<?php

namespace App\Models;
use \DB;

use Illuminate\Database\Eloquent\Model;

class Analysis_video extends Model
{
    public $timestamps = false;
    public function getData()
    {
      $data = DB::table('analysis_video')->get();
  
      return $data;
    }

    public function videoidins($video_id)
    {
      $create_date = date("Y-m-d");
      DB::table('analysis_video')->insert([
        'video_id' => $video_id,
        'create_date' => $create_date
    ]);
    }
    public function videoiddel($video_id)
    {
      DB::table('analysis_video')->where('video_id', $video_id)->delete();
    }
}
