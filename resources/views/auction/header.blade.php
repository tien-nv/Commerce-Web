<!-- HEADER-TOP START -->
<div class="header-top">
    <div class="container">
        <div class="row">
            <!-- HEADER-LEFT-MENU START -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="header-left-menu">
                    <div class="welcome-info">
                        Chào mừng: <span title="{{ $userName ?? 'Người lạ' }}">{{ $userName_show ?? 'Người lạ' }}</span>
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
                            @if(isset($userName_show))
                            <script src="js/user.js"></script>
                            <li><a href="javascript:void(0)" id="profile">Account</a></li>
                            <li><a href="{{ route('showCart') }}">Cart</a></li>
                            <li><a href="{{ route('logOutUser') }}" id="log-out">Sign out</a></li>
                            <div id="overlayProfile" class="my-overlay">
                                <div class="formProductPopup">
                                    <i class="fa fa-times" id="offProfile"></i>
                                    <div class="user-infor col-12">
                                        <h1>Thông tin người dùng</h1>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <table style="width: 100%">
                                                            <tr>
                                                                <th colspan="3">User: </th>
                                                                <td ><span class="username" id="showUsername"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3">Email: </th>
                                                                <td><span class="username" id="showEmail"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3">Sđt: </th>
                                                                <td><span class="username" id="showPhone"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3">Giới tính: </th>
                                                                <td><span class="username" id="showGender"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3">Ngày sinh: </th>
                                                                <td><span class="username" id="showBirth"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3">Địa chỉ: </th>
                                                                <td><span class="username" id="showAddress"></span></td>
                                                            </tr>
                                                        </table>
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
                <!-- CATEGORYS-PRODUCT-SEARCH START -->
                <div class="categorys-product-search">
                    <form class="search-form-cat" action="javascript:void(0)" method="post" class="findForm" id="findForm" name="findForm">
                        {{ csrf_field() }}
                        <div class="search-product form-group">
                            <select class="cat-search" id="category" name="category">
                                <option value="all" selected>--Tất cả--</option>
                                <option value="book">Book</option>
                                <option value="camera">Camera</option>
                                <option value="fridge">Fridge</option>
                                <option value="keyboard">keyboard</option>
                                <option value="laptop">laptop</option>
                                <option value="phone">phone</option>
                                <option value="tv">television</option>
                                <option value="wacth">watch</option>
                            </select>
                            <input type="text" class="form-control search-form" name="search" id="search" placeholder="Nhập từ khóa tìm kiếm ... " />
                            <button class="search-button" value="Search" id="search-button" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                            <div class="search-recommend" id="search-recommend">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- CATEGORYS-PRODUCT-SEARCH END -->
            </div>
        </div>
    </div>
</section>
<!-- HEADER-MIDDLE END -->
<!-- MAIN-MENU-AREA START -->
<header class="main-menu-area" id="myTopnav">
    <div class="container">
        <div class="row">
            <!-- SHOPPING-CART START -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right shopingcartarea">
                <div class="shopping-cart-out pull-right">
                    <div class="shopping-cart">
                        <a class="shop-link" href="{{ route('showCart') }}" title="View my shopping cart">
                            <i class="fa fa-shopping-cart cart-icon"></i>
                            <b>My Cart</b>
                        </a>
                    </div>
                </div>
            </div>
            <!-- SHOPPING-CART END -->
            <!-- MAINMENU START -->
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding-right menuarea">
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