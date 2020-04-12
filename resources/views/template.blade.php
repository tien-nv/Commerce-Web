<!DOCTYPE html>
<html lang="vi-vn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> @yield('title') </title>
        <script src="bin\\jquery341\\jquery.min.js"></script>
        <link rel="stylesheet" href="bin\\bootstrap441\\css\\bootstrap.min.css">
        <script src="bin\\bootstrap441\\js\\bootstrap.min.js"></script>
        <link rel="stylesheet" href="css\\header.css">
        <script src="js\\header.js"></script>
    </head>
    <body>
        <header>
            <div class="container-fluid">
                <div class="pageWidth">
                    <div class="headerBar">
                        <a href="#">
                            <img src="img\\iconHome.png" alt="Commerce_Web" class="iconImg">
                        </a>
                        <form action="#" method="post" class="findForm">
                        {{ csrf_field() }}
                                <div class="form-group selection">
                                    <input type="search" class="form-control inputColor" id="search" placeholder="Tìm kiếm ?" name="search">
                                    <button type="submit" class="btn btn-primary searchColor">Search</button>
                                </div>
                        </form>
                        @section('loginOrNot')
                        @show
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
