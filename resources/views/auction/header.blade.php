<header id="head">
    <div class="container-fluid my">
        <div class="pageWidth">
            <div class="headerBar">
                <div class="headerBar-left">
                    <a href="{{ route('/') }}">
                        <img src="img\\logo.png" alt="Commerce_Web" class="iconImg">
                    </a>
                    <form action="javascript:void(0)" method="post" class="findForm" id="findForm" name="findForm">
                        <!-- chỗ này dùng ajax -->
                        {{ csrf_field() }}
                        <div class="form-group selection">
                            <select class="category" id="category" name="category">
                                <option value="null" selected>--Category--</option>
                                <option value="book">Book</option>
                                <option value="camera">Camera</option>
                                <option value="fridge">Fridge</option>
                                <option value="keyboard">keyboard</option>
                                <option value="laptop">laptop</option>
                                <option value="phone">phone</option>
                                <option value="tv">television</option>
                                <option value="wacth">watch</option>
                            </select>
                            <input type="text" class="form-control inputColor" id="search" placeholder="Tìm kiếm ?" name="search" style="border-radius: 2px;">
                            <button type="submit" class="btn btn-primary searchColor" style="border-radius: 1px;"><i class="fa fa-search" aria-hidden="true" ></i></button>
                        </div>
                    </form>
                </div>
                <div class="headerBar-right">
                    <div class="my-dropdown">
                        <a href="javascript:void(0)" class="headerBar-login" style="margin-right: 40px;font-size: 18px;" title="{{$userName}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{$userName_show }}</a>
                        <div id="my-dropdown-content">
                            {{ csrf_field() }}
                            <a href="javascript:void(0)" id="profile">Profile user</a>
                            <a href="{{route('logOutUser')}}">Check out</a>
                        </div>
                    </div>
                    <a href="{{ route('sellProduct') }}"><button class="btn btn-outline-light " style="border-radius: 0;"><i class="fa fa-shopping-bag"></i> Đăng bán</button></a>
                </div>
                <div id="goTop" class="icon-go-top" title="Go to top">
                    <a href="#head" style="color: black"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i></a>
                </div>
                <div id="overlayProfile" class="my-overlay">
                    <div class="formProductPopup">
                        <i class="fa fa-times" id="offProfile"></i>
                        <div class="user-infor">
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
                                            <button type="button" class="btn btn-danger" id="buttonChangePass" style="margin-right: 10px;">save</button>
                                            <button type="reset" class="btn btn-danger">cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>