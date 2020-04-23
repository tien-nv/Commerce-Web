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
var regEmail = /[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/i; //dấu cộng là xuất hiện 1 lần
var regUserName = /^([a-zA-Z0-9]{1,})([\\._]{0,1})([a-zA-Z0-9]{1,10})$/;
var regPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$/;
var regPhone = /((09|03|07|08|05)+([0-9]{8})\b)/g;
//check dữ liệu nhập vào register
var mess = [
    "Trường này không thể để trống",
    //login message
    "Email không hợp lệ",
    "password phải có 8 kí tự trở lên gồm cả số và chữ, 1 kí tự viết hoa",
    //register message
    "password không khớp",
    "Ngày tháng không hợp lệ",
    "Username từ  chỉ được chứa các kí tự chữ số và dấu . -, tối đa 16 kí tự và kết thúc bằng chữ hoặc số",
    "Số điện thoại không hợp lệ hoặc đã được sử dụng"
];

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

function validateAdminRegister() {
    if (!checkField("registerAdminForm", "adminRegister", regUserName, 5, void(0))) return false;
    if (!checkField("registerAdminForm", "passwordRegister", regPass, 2, void(0))) return false;
    if (!checkField("registerAdminForm", "checkPasswordRegister", regPass, 2, void(0))) return false;
    let pass = document.forms["registerAdminForm"]["passwordRegister"].value;
    let pass_ = document.forms["registerAdminForm"]["checkPasswordRegister"].value;
    if (pass != pass_) {
        document.getElementById("checkPasswordRegister").style.display = "block";
        document.getElementById("checkPasswordRegister").innerHTML = mess[3];
        return false;
    }
    return true;
}


//ckech dữ liệu nhập vào login

// xử lý reponsive navbar
function showNavBar() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}





//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
// xử lý code ajax

//ajax đăng nhập
function loginAjax(name, pass) {
    $(document).ready(function() {
        // var _token = $('input[name="_token"]').val();
        alert('clicked');
        $.ajax({
            url: "userLogin",
            method: "POST",
            data: { name: name, pass: pass },
            success: function(data) {
                $("#login").innerHTML = 'Welcome ' + name;
            },
            error: function() {
                alert('Something went wrong!!!!')
            }
        });
    });
}