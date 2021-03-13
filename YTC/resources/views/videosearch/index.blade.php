@extends('layouts.common')

@section('title', '動画検索')

@section('content')
<section id="new">
<div class="container">
<div id="contents">
<h2>動画検索</h2>


<form method="GET" action="/search">
<p>
<h4>動画ID</h4>
<input type="text" name="video_id" placeholder="動画IDを入力" ></input>
</p>

<p>
<h4>タイトル</h4>
<input type="text" name="video_title" placeholder="タイトルを入力"></input>
</p>

<p>
<h4>取得期間</h4>
<input type="text" id="dateform" class="datepicker" name="start_date" placeholder="期間開始日を入力">
<input type="text" id="dateform2" class="datepicker" name="end_date" placeholder="期間終了日を入力">
</p>
<button class="btn" type="submit">検索</button>
</form>


@if (session('videoidins_msg'))
    <div class="alert">
        {{ session('videosearch_msg') }}
    </div>
@endif
</p>

@if ($result)
<table>
<th>動画ID</th>
<th>動画タイトル</th>
<th>データ取得日</th>
<th>再生数</th>
<th>リンク</th>
@foreach ($result as $value)
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
@endif

</div>
</div>
</section>
@endsection