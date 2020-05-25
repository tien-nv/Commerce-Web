@extends('default')

@section('title','Đấu giá thôi')

@section('addlib')
<script src="js/auction.js"></script>
@endsection

@section('header')
    @include('auction/header')
@endsection

@section('content')
    @include('auction/content')
@endsection

@section('main')
    @include('auction/main')
@endsection

@section('footer')
    @include('user_frontend/footer')
@endsection

@section('add-script')

<!-- COPYRIGHT-AREA END -->
<!-- JS 
		===============================================-->
<!-- jquery js -->
<script src="frontend_js/vendor/jquery-1.11.3.min.js"></script>

<!-- fancybox js -->
<script src="frontend_js/jquery.fancybox.js"></script>

<!-- bxslider js -->
<script src="frontend_js/jquery.bxslider.min.js"></script>

<!-- meanmenu js -->
<script src="frontend_js/jquery.meanmenu.js"></script>

<!-- owl carousel js -->
<script src="frontend_js/owl.carousel.min.js"></script>

<!-- nivo slider js -->
<script src="frontend_js/jquery.nivo.slider.js"></script>

<!-- jqueryui js -->
<script src="frontend_js/jqueryui.js"></script>

<!-- bootstrap js -->
<script src="frontend_js/bootstrap.min.js"></script>

<!-- wow js -->
<script src="frontend_js/wow.js"></script>
<script>
    new WOW().init();
</script>
<!-- main js -->
<script src="frontend_js/main.js"></script>
@endsection