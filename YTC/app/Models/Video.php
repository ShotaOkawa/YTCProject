<?php

namespace App\Models;
use \DB;


use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
    public $timestamps = false;
    public function getData()
    {
      $data = DB::select("SELECT a.video_id,a.video_title,a.play_count,a.create_date FROM video a 
      INNER JOIN (SELECT video_id,MAX(create_date) as create_date FROM video GROUP BY video_id) b 
      ON a.video_id = b.video_id and a.create_date = b.create_date");
  
      return $data;
    }

    public function search($video_id,$video_title,$start_date,$end_date)
    {
      $query = DB::query();
      if(!empty($video_id)) {
        $query->where('video_id', '=', $video_id);
      }
      if(!empty($video_title)) {
        $query->where('video_title', 'like', '%'.$video_title.'%');
      }
      if((!empty($start_date))&&(!empty($end_date))) {
        $query->whereBetween('create_date', [$start_date, $end_date]);
      }
      $data = $query()->get();  
      return $data;
    }
}
