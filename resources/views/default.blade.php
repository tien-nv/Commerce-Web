<!DOCTYPE html>
<html lang="vi-vn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <!-- import để sử dụng các icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js\\header.js"></script>
    <link rel="stylesheet" href="bin\\bootstrap441\\css\\bootstrap.min.css">
    <script src="bin\\jquery341\\jquery.min.js"></script>
    <script src="bin\\bootstrap441\\js\\bootstrap.min.js"></script>
    <link rel="stylesheet" href="css\\style.css">
</head>

<body>
    <!-- đây là phần header -->
    @section('header')
    @show

    <!-- đây là content -->
    @section('content')
    @show

    <!-- đây là phần các biểu diễn như các icon hoặc phần thân của giỏ hàng,admin... -->
    @section('main')
    @show

    <!-- đây là phần biểu diễn footer -->
    @section('footer')
    @show
</body>

</html>