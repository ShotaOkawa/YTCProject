@extends('layouts.common')

@section('title', '動画一覧')

@section('content')
<section id="new">
<div class="container">
<div id="contents">
<h2>動画一覧</h2>
<table>
<th>動画ID</th>
<th>動画タイトル</th>
<th>データ取得日</th>
<th>再生数</th>
<th>リンク</th>
@foreach ($videos as $value)
<tr>
<td><h4>{{$value->video_id}}</h4></td>
<td><h4>{{$value->video_title}}</h4></td>
<td><h4>{{$value->create_date}}</h4></td>
<td><h4>{{$value->play_count}}</h4></td>
<td><a href="https://www.youtube.com/watch?v={{$value->video_id}}" target="_blank" >
<img src="http://i.ytimg.com/vi/{{$value->video_id}}/maxresdefault.jpg" alt="{{$value->video_id}}" class="ytimg"></a></td>
</tr>
@endforeach
</table>
</div>
</div>
</section>
@endsection