<!DOCTYPE html>
<html lang="vi-vn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <!-- import để sử dụng các icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bin\\bootstrap441\\css\\bootstrap.min.css">
    <script src="bin\\jquery341\\jquery.min.js"></script>
    <script src="bin\\bootstrap441\\js\\bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/sellPage.css">
    <script src="js\\sell.js"></script>
</head>

<body>
    @section('navbar')
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: rgb(180, 180, 180);">
        <ul class="navbar-nav lf-auto">
           <a class="navbar-brand" href="javascript:void(0)"><img src="img/shoppingcart.png"></a>
           <li class="nav-item">
              <a class="nav-link" href="javascript:void(0)"></a>   
           </li>
        </ul>
        
        <ul class="navbar-nav ml-auto">
           
           <li class="nav-item ">
              <a class="nav-link custom" href="{{ route('home') }}"><span style="color: #E60A0A; font-size: 32px; vertical-align: middle">Exit</span><img src="img/exit2.png"></a>
              {{-- <a class="navbar-brand" href="#"><img src="img/exit2.png"></a> --}}
           </li>
           
        </ul>
     </nav>
     @show

     @yield('description')
     
</body>

