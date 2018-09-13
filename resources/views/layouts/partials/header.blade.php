<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" width="width=device-width, initial-scale=1">
<!--Bootstrap css -->
<link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
<!-- toastr notifications -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <span style="color:#fff">{{ Auth::user()->name }}</span> <a href="{{ route('logout') }}"
              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              Sign out
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
      </ul>
</nav>
