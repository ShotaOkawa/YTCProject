<DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="登録されている動画IDと動画URLを表示する">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

<script src="{{asset('js/fixmenu_pagetop.js')}}"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="{{asset('js/sp.js')}}"></script>
<script src="{{asset('js/common.js')}}"></script>
</head>
<body>

<header>
<h1 id="logo"><a href="/videolist"><img src="{{ asset('img/logo.png') }}" alt="YouTube Connect"></a></h1>
<nav id="menubar">
<ul>
<li><a href="/videolist">動画一覧</a></li>
<li><a href="/videosearch">動画検索</a></li>
<li><a href="/videolistup">動画ID更新</a></li>
</ul>
</nav>
</header>


@yield('content')

</body>
</html>