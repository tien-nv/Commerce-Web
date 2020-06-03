<!DOCTYPE html>
<html lang="vi-vn">

<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="x-ua-compatible" content="ie=edge"> -->
  <title> @yield('title') </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

  <!-- FONTS
		============================================ -->
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="css/animate.css">

  <!-- FANCYBOX CSS
		============================================ -->
  <link rel="stylesheet" href="css/jquery.fancybox.css">

  <!-- BXSLIDER CSS
		============================================ -->
  <link rel="stylesheet" href="css/jquery.bxslider.css">

  <!-- MEANMENU CSS
		============================================ -->
  <link rel="stylesheet" href="css/meanmenu.min.css">

  <!-- JQUERY-UI-SLIDER CSS
		============================================ -->
  <link rel="stylesheet" href="css/jquery-ui-slider.css">

  <!-- NIVO SLIDER CSS
		============================================ -->
  <link rel="stylesheet" href="css/nivo-slider.css">

  <!-- OWL CAROUSEL CSS 	
		============================================ -->
  <link rel="stylesheet" href="css/owl.carousel.css">

  <!-- OWL CAROUSEL THEME CSS 	
		============================================ -->
  <link rel="stylesheet" href="css/owl.theme.css">

  <!-- BOOTSTRAP CSS 
		============================================ -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- FONT AWESOME CSS 
		============================================ -->
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <!-- NORMALIZE CSS 
		============================================ -->
  <link rel="stylesheet" href="css/normalize.css">

  <!-- MAIN CSS 
		============================================ -->
  <link rel="stylesheet" href="css/main.css">

  <!-- STYLE CSS 
		============================================ -->
  <link rel="stylesheet" href="css/template-style.css">

  <!-- RESPONSIVE CSS 
		============================================ -->
  <link rel="stylesheet" href="css/responsive.css">

  <!-- IE CSS 
		============================================ -->
  <link rel="stylesheet" href="css/ie.css">

  <!-- MODERNIZR JS 
		============================================ -->
  <script src="frontend_js/vendor/modernizr-2.6.2.min.js"></script>

  <!-- Jquery js
   ============================================= -->
  <script src="bin\\jquery341\\jquery.min.js"></script>

  <!-- Global js
   ============================================= -->
   <script src="js/global.js"></script>

  @section('addlib')
  @show
</head>

<body>
  <!-- đây là phần header -->
  <div class="my-overlay" id="wait" style="background-color: rgba(0, 0, 0, 0.712);z-index:10000;">
    <span class="wait">Please wait a seconds...</span>
  </div>
  @section('header')
  @show

  <!-- đây là content -->
  @section('content')
  @show

  <!-- đây là phần các biểu diễn như các icon hoặc phần thân của giỏ hàng,admin... -->
  @section('main')
  @show

  <!-- đây là phần biểu diễn thành phần chat chỉ hiển thị phần giao diện này nếu người dùng đã đăng nhập -->
  @section('chat')
  @show

  <!-- đây là phần biểu diễn footer -->
  @section('footer')
  @show

  @section('add-script')
  @show
</body>

</html>