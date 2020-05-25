@extends('default')

@section('title','Giỏ hàng')

@section('addlib')
<script src="js/buy.js"></script>
@endsection

@section('header')
<!-- HEADER-TOP START -->
<div class="header-top">
    <div class="container">
        <div class="row">
            <!-- HEADER-LEFT-MENU START -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="header-left-menu">
                    <div class="welcome-info">
                        Chào mừng: <span title="{{ $userName ?? 'Người lạ' }}">{{ $userName ?? 'Người lạ' }}</span>
                    </div>
                    <div class="currenty-converter">
                        <form method="post" action="#" id="currency-set">
                            <div class="current-currency">
                                <span class="cur-label">Tiền tệ: </span><strong>VNĐ</strong>
                            </div>
                            <ul class="currency-list currency-toogle">
                                <li>
                                    <a title="VietNam đồng (VNĐ)" href="#">Vietnam đồng (VNĐ)</a>
                                </li>
                                <li>
                                    <a title="Đô la (USD)" href="#">Đô la (USD)</a>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="selected-language">
                        <div class="current-lang">
                            <span class="current-lang-label">Ngôn ngữ: </span><strong>Tiếng Việt</strong>
                        </div>
                        <ul class="languages-choose language-toogle">
                            <li>
                                <a href="#" title="Tiếng Việt">
                                    <span>Tiếng Việt</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="English">
                                    <span>English</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- HEADER-LEFT-MENU END -->
            <!-- HEADER-RIGHT-MENU START -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="header-right-menu">
                    <nav>
                        <ul class="list-inline">
                            <!-- 
                                Nếu người dùng đã đăng nhập thì
                             -->
                            @if(isset($userName))
                            <script src="js/user.js"></script>
                            <li><a href="javascript:void(0)" id="profile">Account</a></li>
                            <li><a href="{{ route('logOutUser') }}" id="log-out">Sign out</a></li>
                            <div id="overlayProfile" class="my-overlay">
                                <div class="formProductPopup">
                                    <i class="fa fa-times" id="offProfile"></i>
                                    <div class="user-infor col-12">
                                        <h1>Thông tin người dùng</h1>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <img src="img/usercard.png" class="my-img">
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <ul>
                                                            <li>User: <span class="username" id="showUsername"></span></li>
                                                            <li>Email: <span id="showEmail"></span></li>
                                                            <li>Sđt: <span id="showPhone"></span></li>
                                                            <li>Giới tính: <span id="showGender"></span></li>
                                                            <li>Birth: <span id="showBirth"></span></li>
                                                            <li>Địa chỉ <span id="showAddress"></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 my-form">
                                                <h2>Thay đổi mật khẩu</h2>
                                                <form action="javascript:void(0)" id="changePass" name="changePass">
                                                    {{ csrf_field() }}
                                                    <span id="oldPass" style="color: red;"></span>
                                                    <input type="password" id="ioldPass" name="oldPass" class="form-control" placeholder="mật khẩu cũ">
                                                    <span id="newPass" style="color: red;"></span>
                                                    <input type="password" id="inewPass" name="newPass" class="form-control" placeholder="mật khẩu mới">
                                                    <span id="checkNewPass" style="color: red;"></span>
                                                    <input type="password" id="icheckNewPass" name="checkNewPass" class="form-control" placeholder="nhập lại mật khẩu mới">
                                                    <div style="display:flex; justify-content: center;">
                                                        <button type="button" class="btn btn-outline-danger" id="buttonChangePass" style="margin-right: 10px;">save</button>
                                                        <button type="reset" class="btn btn-danger">cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div style="display:flex;justify-content: center;margin-bottom:50px">
                                            <button type="button" class="btn btn-outline-dark" id="show-order" style="margin-top: 20px">Xem sản phẩm đã mua</button>
                                            <div class="col-12" id="order-detail" style="display: none;">
                                                <h1>Các sản phẩm đã mua</h1>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table id="get-detail">

                                                        </table>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-outline-dark" id="off-order" style="margin-top:20px">Ẩn chi tiết</button>
                                            </div>
                                        </div>
                                        <div style="display:flex;justify-content: center">
                                            <button type="button" class="btn btn-outline-dark" id="show-sell" style="margin-top: 20px">Xem sản phẩm đã bán</button>
                                            <div class="col-12" id="sell-detail" style="display: none;">
                                                <h1>Các sản phẩm đã bán</h1>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table id="get-detail-sell">

                                                        </table>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-outline-dark" id="off-sell" style="margin-top:20px">Ẩn chi tiết</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- HEADER-RIGHT-MENU END -->
        </div>
    </div>
</div>
<!-- HEADER-TOP END -->
<!-- HEADER-MIDDLE START -->
<section class="header-middle">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- LOGO START -->
                <div class="logo">
                    <img src="img/logo.png" alt="bstore logo" style="width:140px;height:100px" />
                </div>
                <!-- LOGO END -->
                <!-- HEADER-RIGHT-CALLUS START -->
                <a href="{{ route('sellProduct') }}">
                    <div class="header-right-callus">
                        <h3>BÁN SẢN PHẨM</h3>
                        <span>theo cách của bạn</span>
                    </div>
                </a>
                <!-- HEADER-RIGHT-CALLUS END -->

            </div>
        </div>
    </div>
</section>
<!-- HEADER-MIDDLE END -->
<!-- MAIN-MENU-AREA START -->
<header class="main-menu-area" id="myTopnav">
    <div class="container">
        <div class="row">
            <!-- MAINMENU START -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding-right menuarea">
                <div class="mainmenu">
                    <nav>
                        <ul class="list-inline mega-menu">
                            <li class="active"><a href="javascript:void(0)">Trang chủ</a>
                                <!-- DROPDOWN MENU START -->
                                <div class="home-var-menu">
                                    <ul class="home-menu">
                                        <li><a href="{{ route('home') }}" id="all">Trang chủ</a></li>
                                    </ul>
                                </div>
                                <!-- DROPDOWN MENU END -->
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- MAINMENU END -->
        </div>
        <div class="row">
            <!-- MOBILE MENU START -->
            <div class="col-sm-12 mobile-menu-area">
                <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                    <span class="mobile-menu-title">MENU</span>
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}" id="all">Trang chủ</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- MOBILE MENU END -->
        </div>
    </div>
</header>
<!-- MAIN-MENU-AREA END -->
@endsection

@section('main')
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- BSTORE-BREADCRUMB START -->
                <div class="bstore-breadcrumb">
                    <a href="{{ route('home') }}">Trang chủ</a>
                    <span><i class="fa fa-caret-right	"></i></span>
                    <span>Giỏ hàng của bạn</span>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- SHOPPING-CART SUMMARY START -->
                <h2 class="page-title">Giỏ hàng tạm thời của bạn <span class="shop-pro-item">Hãy kiểm tra hàng trước khi thanh toán</span></h2>
                <!-- SHOPPING-CART SUMMARY END -->
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- SHOPING-CART-MENU START -->
                <!-- <div class="shoping-cart-menu">
                    <ul class="step">
                        <li class="step-current first">
                            <span>01. Summary</span>
                        </li>
                        <li class="step-todo third">
                            <span>02. Address</span>
                        </li>
                        <li class="step-todo four">
                            <span>04. Shipping</span>
                        </li>
                        <li class="step-todo last" id="step_end">
                            <span>05. Payment</span>
                        </li>
                    </ul>
                </div> -->
                <!-- SHOPING-CART-MENU END -->
                <!-- CART TABLE_BLOCK START -->
                <div class="table-responsive">
                    <!-- TABLE START -->
                    <table class="table table-bordered" id="cart-summary">
                        <!-- TABLE HEADER START -->
                        <thead>
                            <tr>
                                <th class="cart-product">Sản phẩm</th>
                                <th class="cart-description">Mô tả</th>
                                <th class="cart-avail text-center">Trạng thái</th>
                                <th class="cart-unit text-right">Đơn giá</th>
                                <th class="cart_quantity text-center">Số lượng</th>
                                <th class="cart-delete">&nbsp;</th>
                                <th class="cart-total text-right">Tổng</th>
                            </tr>
                        </thead>
                        <!-- TABLE HEADER END -->
                        <!-- TABLE BODY START -->
                        <tbody>
                            @for($i = 0;$i < $len;$i++)
                            <!-- SINGLE CART_ITEM START -->
                            <tr id="{{ $cart[$i]['ID'] }}">
                                <td class="cart-product">
                                    <a href="javascript:void(0)"><img src="{{ $cart[$i]['Img'][0] }}"></a>
                                </td>
                                <td class="cart-description">
                                    <p class="product-name"><a href="javascript:void(0)">Loại sản phẩm: {{ $cart[$i]['Type'] }}</a></p>
                                    <small>Tên sản phẩm: {{ $cart[$i]['Product_Name'] }}</small>
                                    <small><a href="javascript:void(0)">Color:</a></small>
                                </td>
                                <td class="cart-avail"><span class="label label-success">Khả dụng</span></td>
                                <td class="cart-unit">
                                    <ul class="price text-right">
                                        <li class="price special-price">{{ $cart[$i]['Cost'] }} vnđ</li>
                                        <li class="price-percent-reduction small">&nbsp;-3%&nbsp;</li>
                                        <li class="old-price">$27.00</li>
                                    </ul>
                                </td>
                                <td class="cart_quantity text-center">
                                    <div class="">
                                        <input class="form-control" type="number" name="qtybutton" value="{{ $cart[$i]['Count'] }}" disabled>
                                    </div>
                                </td>
                                <td class="cart-delete text-center">
                                    <a href="javascript:void(0)" class="cart_quantity_delete" title="Delete" onclick="remove({{ $cart[$i]['ID'] }})"><i class="fa fa-trash-o"></i></a>
                                </td>
                                <td class="cart-total">
                                    <span class="price">{{ $cart[$i]['Cost']*$cart[$i]['Count'] }} vnđ</span>
                                </td>
                            </tr>
                            <!-- SINGLE CART_ITEM END -->
                            @endfor
                        </tbody>
                        <!-- TABLE BODY END -->
                        <!-- TABLE FOOTER START -->
                        <!-- <tfoot>
                            <tr class="cart-total-price">
                                <td class="cart_voucher" colspan="3" rowspan="4"></td>
                                <td class="text-right" colspan="3">Tổng tiền sản phẩm</td>
                                <td id="total_product" class="price" colspan="1">{{ $total }} vnđ</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="3">Phí vận chuyển</td>
                                <td id="total_shipping" class="price" colspan="1">15000 vnđ</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="3">Khuyến mãi</td>
                                <td class="price" colspan="1">0 vnđ</td>
                            </tr>
                            <tr>
                                <td class="total-price-container text-right" colspan="3">
                                    <span>Tổng thanh toán</span>
                                </td>
                                <td id="total-price-container" class="price" colspan="1">
                                    <span id="total-price">{{ $total + 15000 }} vnđ</span>
                                </td>
                            </tr>
                        </tfoot> -->
                        <!-- TABLE FOOTER END -->
                    </table>
                    <!-- TABLE END -->
                </div>
                <!-- CART TABLE_BLOCK END -->
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- RETURNE-CONTINUE-SHOP START -->
                <div class="returne-continue-shop">
                    <a href="{{ route('home') }}" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua sắm</a>
                    <a href="{{ route('showPayment') }}" class="procedtocheckout">Chuyển tới thanh toán<i class="fa fa-chevron-right"></i></a>
                </div>
                <!-- RETURNE-CONTINUE-SHOP END -->
            </div>
        </div>
    </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
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