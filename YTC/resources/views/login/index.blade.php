<!DOCTYPE html>
<!--[if lte IE 9]>
<html class="ie" lang="en">
<![endif]-->
<!--[if gt IE 9]><!-->
<html lang="ja">
<!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>YTCLogin</title>
<link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
</head>
<body>
<img class="logo" src="{{ asset('img/logo.png') }}" alt="logo">
<div class="form-wrapper">
  <h1>Sign In</h1>
  @if (session('loginmsg'))
    <div class="alert alert-danger">
        {{ session('loginmsg') }}
    </div>
@endif

  <form action="/loginchk" method="post">
    <div class="form-item">
      <label for="username"></label>
      @csrf
      <input type="text" name="username" required="required" placeholder="Username"></input>
    </div>
    <div class="form-item">
      <label for="password"></label>
      @csrf
      <input type="password" name="password" required="required" placeholder="Password"></input>
    </div>
    <div class="button-panel">
      <input type="submit" class="button" title="Sign In" value="Sign In"></input>
    </div>
  </form>
  <div class="form-footer">
    <p><a href="#">Create an account</a></p>
  </div>
</div>
</div>
</body>
</html>