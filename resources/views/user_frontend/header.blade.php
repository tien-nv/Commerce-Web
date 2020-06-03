<!-- HEADER-TOP START -->
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
<div class="header-top">
    <div class="container">
        @if(isset($check))
        <div class="row">
            <div class="col-12">
                @if($check == true)
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong id="alert-header">{{ $alert }}</strong>
                </div>
                @else
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $alert }}</strong>
                </div>
                @endif
            </div>
        </div>
        @endif
        @if(isset($checkRegister))
        <div class="row">
            <div class="col-12">
                @if($checkRegister == true)
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $alert }}</strong>
                </div>
                @else
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $alert }}</strong>
                </div>
                @endif
            </div>
        </div>
        @endif
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
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: flex;justify-content: center">
                                                        <table style="width: 100%">
                                                            <tr>
                                                                <th colspan="3">User: </th>
                                                                <td><span class="username" id="showUsername"></span></td>
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
                            @else
                            <!-- 
                                Thêm file js xử lý phần đăng nhập
                             -->
                            <script src="bin/crypto-js/aes.js"></script>
                            <script src="bin/crypto-js/md5.js"></script>
                            <script src="js/login.js"></script>
                            <!-- 
                                Phần xử hiển thị cho người chưa đăng nhập
                             -->
                            <li><a href="javascript:void(0)" onclick="onRegister()">User sign up</a></li>
                            <li><a href="javascript:void(0)" onclick="onLogin()">User sign in</a></li>
                            <li><a href="javascript:void(0)" onclick="onAdminLogin()">Admin sign in</a></li>
                            <div id="overlayRegister">
                                <form action="{{ route('userRegister') }}" onsubmit="return validateRegister()" method="post" class="formContentPopup" name="registerForm" id="registerForm">
                                    {{ csrf_field() }}
                                    <h3 class="popupHeading">Đăng kí tài khoản mới</h3>
                                    <div>
                                        <span class="my-alert-input" id="emailRegister"></span>
                                        <input type="email" id="inputEmail" name="emailRegister" class="form-control" placeholder="Email" onkeyup="checkConflicUserRegister('#inputEmail','#emailRegister','mail')">
                                    </div>
                                    <div>
                                        <span class="my-alert-input" id="userRegister"></span>
                                        <input type="text" id="inputUsername" name="userRegister" class="form-control" placeholder="UserName" onkeyup="checkConflicUserRegister('#inputUsername','#userRegister','username')">
                                    </div>
                                    <div>
                                        <span class="my-alert-input" id="phoneRegister"></span>
                                        <input type="text" id="inputPhone" name="phoneRegister" class="form-control" placeholder="Phone number" onkeyup="checkConflicUserRegister('#inputPhone','#phoneRegister','phone')">
                                    </div>
                                    <div>
                                        <span class="my-alert-input" id="passwordRegister"></span>
                                        <input type="password" name="passwordRegister" class="form-control" placeholder="Mật khẩu">
                                    </div>
                                    <div>
                                        <span class="my-alert-input" id="checkPasswordRegister"></span>
                                        <input type="password" name="checkPasswordRegister" class="form-control" placeholder="Xác nhận mật khẩu">
                                    </div>
                                    <div class="divider">
                                        <span>Một số thông tin khác</span>
                                    </div>
                                    <span class="my-alert-input" id="birthday"></span>
                                    <label for="birthday">Ngày sinh:</label>
                                    <div>
                                        <input type="date" name="birthday" id="birthday" class="form-control" style="margin: 0 0 10px 0;">
                                    </div>
                                    <label for="gender">Giới tính:</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="men">nam</option>
                                        <option value="women">nữ</option>
                                        <option value="not_all">không muốn nói</option>
                                    </select>
                                    <label for="address">Địa chỉ:</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Địa chỉ nhận hàng" require></textarea>
                                    <div style="margin: 30px 0 0 0;">
                                        <button type="submit" class="btn btn-outline-danger">Đăng kí tài khoản</button>
                                        <button type="button" class="btn btn-danger" onclick="offRegister()">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div id="overlayLogin">
                                <form action="{{ route('userLogin')}}" onsubmit="return validateLogin()" method="post" name="loginForm" class="formContentPopup" id="loginForm">
                                    {{ csrf_field() }}
                                    <h3 class="popupHeading">Đăng nhập như User</h3>
                                    <div>
                                        <span class="my-alert-input" id="usernameLogin"></span>
                                        <input type="text" name="usernameLogin" class="form-control" placeholder="UserName">
                                    </div>
                                    <div>
                                        <span class="my-alert-input" id="passwordLogin"></span>
                                        <input type="password" name="passwordLogin" id="userPasswordLogin" class="form-control" placeholder="Mật khẩu">
                                    </div>
                                    <div class="divider">
                                        <a href="#">Quên mật khẩu?</a>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-outline-danger">Đăng nhập tài khoản</button>
                                        <button type="button" class="btn btn-danger" onclick="offLogin()">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div id="overlayAdminLogin">
                                <form action="{{ route('adminLogin') }}" onsubmit="return validateAdminLogin()" method="post" name="loginAdminForm" class="formContentPopup" id="loginAdminForm">
                                    {{ csrf_field() }}
                                    <h3 class="popupHeading">Đăng nhập như Admin</h3>
                                    <div>
                                        <span class="my-alert-input" id="adminLogin"></span>
                                        <input type="text" name="adminLogin" class="form-control" placeholder="Admin Name">
                                    </div>
                                    <div>
                                        <span class="my-alert-input" id="passwordAdminLogin"></span>
                                        <input type="password" name="passwordAdminLogin" class="form-control" placeholder="Mật khẩu">
                                    </div>
                                    <div class="divider">
                                        <a href="javascript:void(0)" onclick="offAdminLogin();onLogin();">Không phải Admin?</a>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-outline-danger">Đăng nhập tài khoản</button>
                                        <button type="button" class="btn btn-danger" onclick="offAdminLogin()">Cancel</button>
                                    </div>
                                </form>
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

<!-- MAIN-MENU-AREA START -->
<header class="main-menu-area" id="myTopnav">
    <div class="container">
        <div class="row">
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
                            <li>
                                <a href="javascript:void(0)"><i class="fa fa-rss" aria-hidden="true"></i> Công nghệ</a>
                                <!-- DRODOWN-MEGA-MENU START -->
                                <div class="drodown-mega-menu">
                                    <div class="left-mega col-xs-6">
                                        <div class="mega-menu-list">
                                            <a class="mega-menu-title" href="javascript:void(0)">Sản phẩm</a>
                                            <ul>
                                                <li><a href="javascript:void(0)" id="laptop">Máy tính</a></li>
                                                <li><a href="javascript:void(0)" id="camera">Máy ảnh</a></li>
                                                <li><a href="javascript:void(0)" id="phone">Điện thoại</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="right-mega col-xs-6">
                                        <div class="mega-menu-list">
                                            <a class="mega-menu-title" href="javascript:void(0)">Phụ kiện</a>
                                            <ul>
                                                <li><a href="javascript:void(0)" id="keyboard">Bàn phím</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- DRODOWN-MEGA-MENU END -->
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="fa fa-book" aria-hidden="true"></i> Trang trí</a>
                                <!-- DRODOWN-MEGA-MENU START -->
                                <div class="drodown-mega-menu">
                                    <div class="left-mega col-xs-6">
                                        <div class="mega-menu-list">
                                            <ul>
                                                <li><a href="javascript:void(0)" id="book">Books</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- DRODOWN-MEGA-MENU END -->
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="fa fa-bookmark" aria-hidden="true"></i> Thời trang</a>
                                <!-- DRODOWN-MEGA-MENU START -->
                                <div class="drodown-mega-menu">
                                    <div class="left-mega col-xs-6">
                                        <div class="mega-menu-list">
                                            <a class="mega-menu-title" href="javascript:void(0)">Phổ biến</a>
                                            <ul>
                                                <li><a href="javascript:void(0)" id="tv">Television</a></li>
                                                <li><a href="javascript:void(0)" id="watch">Watch</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="right-mega col-xs-6">
                                        <div class="mega-menu-list">
                                            <a class="mega-menu-title" href="javascript:void(0)">Khác</a>
                                            <ul>
                                                <li><a href="javascript:void(0)" id="fridge">Fridge</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- DRODOWN-MEGA-MENU END -->
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="fa fa-info" aria-hidden="true"></i> Khác</a>
                                <!-- DRODOWN-MEGA-MENU START -->
                                <div class="drodown-mega-menu">
                                    <div class="left-mega col-xs-12">
                                        <div class="mega-menu-list">
                                            <a class="mega-menu-title" href="javascript:void(0)">Sản phẩm mới</a>
                                            <ul>
                                                <li><a href="javascript:void(0)">Đang cập nhật</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- DRODOWN-MEGA-MENU END -->
                            </li>
                            <li><a href="{{ route('auction') }}"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Đấu giá</a></li>
                            <li style="float: right">
                                    <a href="{{ route('showCart') }}" title="View my shopping cart">
                                        <i class="fa fa-shopping-cart cart-icon"></i>
                                        <b>My Cart</b>
                                    </a>
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
                            <li><a href="javascript:void(0)">Trang chủ</a>
                                <ul>
                                    <li><a href="{{ route('home') }}" id="all">Trang chủ</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-rss" aria-hidden="true"></i> Công nghệ</a>
                                <ul>
                                    <li><a class="mega-menu-title" href="javascript:void(0)">Sản phẩm</a>
                                        <ul>
                                            <li><a href="javascript:void(0)" id="laptop">Máy tính</a></li>
                                            <li><a href="javascript:void(0)" id="camera">Máy ảnh</a></li>
                                            <li><a href="javascript:void(0)" id="phone">Điện thoại</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="mega-menu-title" href="javascript:void(0)">Phụ kiện</a>
                                        <ul>
                                            <li><a href="javascript:void(0)" id="keyboard">Bàn phím</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-book" aria-hidden="true"></i> Trang trí</a>

                                <ul>
                                    <li><a href="javascript:void(0)" id="book">Books</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-bookmark" aria-hidden="true"></i> Thời trang</a>
                                <ul>
                                    <li><a href="javascript:void(0)" id="tv">Television</a></li>
                                    <li><a href="javascript:void(0)" id="watch">Watch</a></li>
                                    <li><a href="javascript:void(0)" id="fridge">Fridge</a></li>
                                </ul>
                            </li>
                            <li> <a href="javascript:void(0)"><i class="fa fa-info" aria-hidden="true"></i> Khác</a>
                                <ul>
                                    <li><a href="javascript:void(0)">Đang cập nhật</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('auction') }}"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Đấu giá</a></li>
                            <li style="float: right">
                                    <a href="{{ route('showCart') }}" title="View my shopping cart">
                                        <i class="fa fa-shopping-cart cart-icon"></i>
                                        <b>My Cart</b>
                                    </a>
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