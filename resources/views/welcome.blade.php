<!DOCTYPE html>
<html lang="vi-vn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PornHub of VietNamese</title>
        <script src="..\\bin\\jquery341\\jquery.min.js"></script>
        <link rel="stylesheet" href="..\\bin\\bootstrap441\\css\\bootstrap.min.css">
        <script src="..\\bin\\bootstrap441\\js\\bootstrap.min.js"></script>
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
                                <div class="form-group selection">
                                    <input type="search" class="form-control inputColor" id="search" placeholder="Tìm kiếm ?" name="search">
                                    <button type="submit" class="btn btn-primary searchColor">Search</button>
                                </div>
                        </form>
                        <div class="headerBar-right">
                            <a href="#registerForm" class="headerBar-register" onclick="onRegister()">Đăng ký</a>
                            <a href="#loginForm" class="headerBar-login" onclick="onLogin()">Đăng nhập</a>
                            <a href="#"><button class="btn btn-primary searchColor">Đăng bán</button></a>
                        </div>
                        <div id="overlayRegister">
                            <form action="/routes/controlRegister.php" onsubmit="return validateRegister()" method="post" class="formContentPopup" name="registerForm" id="registerForm">
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
                            <form action="/routes/controlLogin.php" onsubmit="return validateLogin()" method="post" name="loginForm" class="formContentPopup" id="loginForm">
                                <h3 class="popupHeading">Đăng nhập vào tài khoản</h3>
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
                                    <button type="button" class="btn btn-primary setColor" onclick="offLogin()" >Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="headerBar-nav">
                    <div class="pageWidth">
                        <div class="headerBar-navInner">
                            <div class="dropdown Popup">
                                <span class="dropbtn">Danh mục sản phẩm</span>
                                <ul type="none" class="dropdown-content" >
                                    <li id="li1"><a href="#">Link 1</a>
                                        <ul type="none" class="dropright-content">
                                            <li><a href="#">Link 1.1</a></li>
                                            <li><a href="#">Link 1.2</a></li>
                                            <li><a href="#">Link 1.3</a></li>
                                        </ul>
                                    </li>
                                    <li id="li2"><a href="#">Link 2</a>
                                        <ul type="none" class="dropright-content">
                                            <li><a href="#">Link 2.1</a></li>
                                            <li><a href="#">Link 2.2</a></li>
                                            <li><a href="#">Link 2.3</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
