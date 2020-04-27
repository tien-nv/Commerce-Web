<header>
    <div class="container-fluid">
        <div class="pageWidth">
            <div class="headerBar">
                <div class="headerBar-left">
                <a href="#">
                    <img src="img\\iconHome.png" alt="Commerce_Web" class="iconImg">
                </a>
                <form action="javascript:void(0)" method="post" class="findForm" id="findForm" name="findForm">
                    <!-- chỗ này dùng ajax -->
                    {{ csrf_field() }}
                    <div class="form-group selection">
                        <input type="search" class="form-control inputColor" id="search" placeholder="Tìm kiếm ?" name="search">
                        <button type="submit" class="btn btn-primary searchColor">Search</button>
                    </div>
                </form>
                </div>
                @if(isset($resultRegister) && $resultRegister === false)
                <script>
                    alert("something went wrong can't register");
                </script>
                @elseif(isset($resultRegister) && $resultRegister === true)
                <script>
                    alert("Success Register bạn đã đăng nhập thành công");
                </script>
                @endif
                @if(isset($check) && $check === false)
                <script>
                    alert("something went wrong!!! username or password not true");
                </script>
                @endif
                @if(!isset($userName) ||(isset($check) && $check === false))
                <div class="headerBar-right">
                    <a href="javascript:void(0)" class="headerBar-register" onclick="onRegister()">Đăng ký</a>
                    <div class="my-dropdown">
                        <span class="headerBar-login">Đăng nhập</span>
                        <div id="my-dropdown-content">
                            <a href="javascript:void(0)" onclick="onLogin()">User Login</a>
                            <a href="javascript:void(0)" onclick="onAdminLogin()">Admin Login</a>
                        </div>
                    </div>
                    <a href="#"><button class="btn btn-primary searchColor">Đăng bán</button></a>
                </div>
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
                            <input type="date" name="birthday" class="form-control" style="margin: 0 0 10px 0;">
                        </div>
                        <label for="sel1">Giới tính:</label>
                        <select class="form-control" id="sel1" name="sel1" required>
                            <option value="men">nam</option>
                            <option value="women">nữ</option>
                            <option value="not_all">không muốn nói</option>
                        </select>
                        <label for="address">Địa chỉ:</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Địa chỉ nhận hàng" require></textarea>
                        <div style="margin: 30px 0 0 0;">
                            <button type="submit" class="btn btn-primary setColor">Đăng kí tài khoản</button>
                            <button type="button" class="btn btn-primary setColor" onclick="offRegister()">Cancel</button>
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
                            <button type="submit" class="btn btn-primary setColor">Đăng nhập tài khoản</button>
                            <button type="button" class="btn btn-primary setColor" onclick="offAdminLogin()">Cancel</button>
                        </div>
                    </form>
                </div>
                @elseif(isset($userName) && ((isset($check) && $check === true) || (isset($resultRegister) && $resultRegister === true)))
                <div class="headerBar-right">
                    <div class="my-dropdown">
                        <a href="javascript:void(0)" class="headerBar-login" style="margin-right: 40px;color: green;">Welcome {{$userName }}</a>
                        <div id="my-dropdown-content">
                            <a href="#">Profile user</a>
                            <a href="{{route('logOutUser')}}">Check out</a>
                        </div>
                    </div>
                    <a href="#"><button class="btn btn-primary searchColor">Đăng bán</button></a>
                </div>
                @endif
            </div>
        </div>
    </div>
</header>
<!-- script ajax -->
<script>
    //function ajax để check các trường mà người dùng nhập vào có bị trùng lặp hay không
    //check từ database.
    function checkConflicUserRegister(idInput, idError, field) {
        var inputVal = $(idInput).val();
        if (inputVal.length > 0) {
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "userInputRegister",
                method: "post",
                data: {
                    _token: _token,
                    inputVal: inputVal,
                    field: field
                },
                // headers: {'X-CSRF-TOKEN': _token},
                success: function(data) {
                    $(idError).css("display", "block");
                    if (data == 0) {
                        // alert("ok");
                        $(idError).css("color", "red");
                        $(idError).text("Đã có người sử dụng cái này :)");
                        $('#registerForm').onsub
                    } else {
                        $(idError).css("color", "green");
                        $(idError).text('Cái này chưa ai dùng <3');
                    }
                },
                error: function() {
                    alert('Something went wrong!!!!')
                }
            });
        } else {
            $(idError).css("color", "red");
            $(idError).css("display", "none");
        }
    }


    //function khi người dùng click xem thêm thì query thêm



    //function khi người dùng tìm kiếm một cái gì đó
</script>