@extends('layouts.common')

@section('title', '動画ID更新')

@section('content')
<section id="new">
<div class="container">
<div id="contents">
<h2>分析動画ID更新</h2>
<p>
<form method="GET" action="/videoidins">
<input type="text" name="video_id" placeholder="動画IDを入力" required></input>
<td><button class="btn btn-border" type="submit">登録する</button></td>
</form>
@if (session('videoidins_msg'))
    <div class="alert">
        {{ session('videoidins_msg') }}
    </div>
@endif
</p>
<table>
<th>動画ID</th>
<th>URL</th>
<th>削除</th>
@foreach ($videos as $value)
<form method="GET" action="/videoiddel">
<tr>
<td><h4>{{$value->video_id}}</h4></td>
<td><a href="https://www.youtube.com/watch?v={{$value->video_id}}" target="_blank" >
<img src="http://i.ytimg.com/vi/{{$value->video_id}}/maxresdefault.jpg" alt="{{$value->video_id}}" class="ytimg"></a></td>
<input type="hidden" name="video_id" value="{{$value->video_id}}"></input>
<td><button class="btn btn-border" type="submit">削除する</button></td>
</form>
</tr>
@endforeach
</table>
</div>
</div>
</section>
@endsection