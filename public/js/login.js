//hiển thị đè thông tin đăng kí

function onRegister() {
    document.getElementById("overlayRegister").style.display = "block";
}

function offRegister() {
    document.getElementById("overlayRegister").style.display = "none";
}


//hiển thị thông tin đăng nhập

function onLogin() {
    document.getElementById("overlayLogin").style.display = "block";
}

function offLogin() {
    document.getElementById("overlayLogin").style.display = "none";
}

//hiển thị thông tin đăng nhập cho admin

function onAdminLogin() {
    document.getElementById("overlayAdminLogin").style.display = "block";
}

function offAdminLogin() {
    document.getElementById("overlayAdminLogin").style.display = "none";
}


//login and register
function checkField(nameForm, nameElement, reg, number, show) {
    let val = document.forms[nameForm][nameElement].value;
    document.forms[nameForm][nameElement].onclick = function() {
        document.getElementById(nameElement).style.display = "none";
    };
    if (val.length == 0) {
        show;
        document.getElementById(nameElement).innerHTML = mess[0];
        document.getElementById(nameElement).style.display = "block";
        return false;
    }
    if (!reg.test(val)) {
        show;
        document.getElementById(nameElement).innerHTML = mess[number];
        document.getElementById(nameElement).style.display = "block";
        return false;
    }
    return true;
}

function checkDate() {
    let birthday = document.forms["registerForm"]["birthday"].value;
    let year = birthday.substring(0, 4);
    let month = birthday.substring(5, 7);
    let day = birthday.substring(8, 10);
    if (month > 0 && month <= 12) {
        if (month == 2) {
            if ((((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0))) {
                if (day <= 29) return true;
                else return false;
            } else {
                if (day <= 28) return true;
                else return false;
            }
        }
        if (month <= 7 && month % 2 == 1) { // 1 3 5 7 9 11
            if (day <= 31) return true;
            else return false;
        } else if (month <= 7 && month % 2 == 0) {
            if (day <= 30) return true;
            else return false;
        }
        if (month >= 8 && month % 2 == 0) {
            if (day <= 31) return true;
            else return false;
        } else if (month >= 8 && month % 2 == 1) {
            if (day <= 30) return true;
            else return false;
        }
    }
}

function validateLogin() {
    if (!checkField("loginForm", "usernameLogin", regUserName, 5, onLogin())) return false;
    if (!checkField("loginForm", "passwordLogin", regPass, 2, onLogin())) return false;
    return true;
}

function validateAdminLogin() {
    if (!checkField("loginAdminForm", "adminLogin", regUserName, 5, onAdminLogin())) return false;
    if (!checkField("loginAdminForm", "passwordAdminLogin", regPass, 2, onAdminLogin())) return false;

    return true;
}

function validateRegister() {
    if (!checkField("registerForm", "emailRegister", regEmail, 1, onRegister())) return false;
    if (!checkField("registerForm", "userRegister", regUserName, 5, onRegister())) return false;
    if (!checkField("registerForm", "phoneRegister", regPhone, 6, onRegister())) return false;
    if (!checkField("registerForm", "passwordRegister", regPass, 2, onRegister())) return false;
    if (!checkField("registerForm", "checkPasswordRegister", regPass, 2, onRegister())) return false;
    let pass = document.forms["registerForm"]["passwordRegister"].value;
    let pass_ = document.forms["registerForm"]["checkPasswordRegister"].value;
    if (pass != pass_) {
        document.getElementById("checkPasswordRegister").style.display = "block";
        document.getElementById("checkPasswordRegister").innerHTML = mess[3];
        return false;
    }
    if (checkDate() == false) {
        document.forms["registerForm"]["birthday"].onclick = function() {
            document.getElementById("birthday").style.display = "none";
        };
        document.getElementById("birthday").style.display = "block";
        document.getElementById("birthday").innerHTML = mess[4];
        return false;
    }
    return true;
}




//code ajjax xử lysc các sự kiện js
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
                    $('#registerForm').attr('onsubmit', ' return false');
                } else {
                    $(idError).css("color", "green");
                    $(idError).text('Cái này chưa ai dùng <3');
                    $('#registerForm').attr('onsubmit', 'return validateRegister()');
                }
            },
            error: function() {}
        });
    } else {
        $(idError).css("color", "red");
        $(idError).css("display", "none");
    }
};