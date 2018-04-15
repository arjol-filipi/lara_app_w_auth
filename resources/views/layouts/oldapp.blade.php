<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name','Lsapp')}}</title>

    
    </head>
    <body>
    @include('inc.navbar')
    <div class="container pt-5">
        @include('inc.messages')
    @yield('content')
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    </body>
</html>
<div class="container mb-3 pb-3">
<nav class="navbar navbar-expand-md navbar-dark fixed-top inline bg-dark">
    <a class="navbar-brand" href="#">{{$title}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="/services">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="/post">Blog</a>
          </li>
          
          
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
              <a class="nav-link " href="/post/create">Make new entry</a>
          </li>
      </ul>
      <!---
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    -->
    </div>
  </nav>
</div>