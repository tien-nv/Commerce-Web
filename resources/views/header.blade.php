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
                @if(!isset($userName))
                <div class="headerBar-right">
                    <a href="javascript:void(0)" class="headerBar-register" onclick="onRegister()">Đăng ký</a>
                    <div class="my-dropdown">
                        <span class="headerBar-login" >Đăng nhập</span>
                        <div id="my-dropdown-content">
                            <a href="javascript:void(0)" onclick="onLogin()">User Login</a>
                            <a href="javascript:void(0)" onclick="onAdminLogin()">Admin Login</a>
                        </div>
                    </div>
                    <a href="#"><button class="btn btn-primary searchColor">Đăng bán</button></a>
                </div>
                <div id="overlayRegister">
                    <form action="{{ url('register') }}" onsubmit="return validateRegister()" method="post" class="formContentPopup" name="registerForm" id="registerForm">
                        {{ csrf_field() }}
                        <h3 class="popupHeading">Đăng kí tài khoản mới</h3>
                        <div>
                            <span class="my-alert-input" id="emailRegister"></span>
                            <input type="email" name="emailRegister" class="form-control" placeholder="Email">
                        </div>
                        <div>
                            <span class="my-alert-input" id="userRegister"></span>
                            <input type="text" name="userRegister" class="form-control" placeholder="UserName">
                        </div>
                        <div>
                            <span class="my-alert-input" id="phoneRegister"></span>
                            <input type="text" name="phoneRegister" class="form-control" placeholder="Phone number">
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
                            <input type="date" name="birthday" class="form-control" style="margin: 0 0 10px 0;">
                        </div>
                        <label for="sel1">Giới tính:</label>
                        <select class="form-control" id="sel1" name="sellist1" required>
                            <option value="1">nam</option>
                            <option value="0">nữ</option>
                            <option value="-1">không muốn nói</option>
                        </select>
                        <div>
                            <button type="submit" class="btn btn-primary setColor">Đăng kí tài khoản</button>
                            <button type="button" class="btn btn-primary setColor" onclick="offRegister()">Cancel</button>
                        </div>
                    </form>
                </div>
                <div id="overlayLogin">
                    <form action="{{ url('login') }}" onsubmit="return validateLogin()" method="post" name="loginForm" class="formContentPopup" id="loginForm">
                        {{ csrf_field() }}
                        <h3 class="popupHeading">Đăng nhập như User</h3>
                        <div>
                            <span class="my-alert-input" id="usernameLogin"></span>
                            <input type="text" name="usernameLogin" class="form-control" placeholder="UserName">
                        </div>
                        <div>
                            <span class="my-alert-input" id="passwordLogin"></span>
                            <input type="password" name="passwordLogin" class="form-control" placeholder="Mật khẩu">
                        </div>
                        <div class="divider">
                            <a href="#">Quên mật khẩu?</a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary setColor">Đăng nhập tài khoản</button>
                            <button type="button" class="btn btn-primary setColor" onclick="offLogin()">Cancel</button>
                        </div>
                    </form>
                </div>
                <div id="overlayAdminLogin">
                    <form action="{{ url('adminlogin') }}" onsubmit="return validateAdminLogin()" method="post" name="loginAdminForm" class="formContentPopup" id="loginAdminForm">
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
                            <a href="#loginForm" onclick="offAdminLogin();onLogin();">Không phải Admin?</a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary setColor">Đăng nhập tài khoản</button>
                            <button type="button" class="btn btn-primary setColor" onclick="offAdminLogin()">Cancel</button>
                        </div>
                    </form>
                </div>
                @else
                <div class="headerBar-right">
                    <a href="#" class="headerBar-login" style="margin-right: 40px;color: green;">Welcome {{$userName }}</a>
                    <a href="#"><button class="btn btn-primary searchColor">Đăng bán</button></a>
                </div>
                @endif
            </div>
        </div>
    </div>
</header>