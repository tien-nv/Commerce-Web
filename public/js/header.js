//khởi tạo các biến toàn cục
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




//hiển thị thông tin cá nhân của user
$(document).ready(function() {
    $('#profile').click(function() {
        $.ajax({
            url: "userDescription",
            method: "get",
            data: {},
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            success: function(data) {
                //'UserName','Address','Mail','Phone','Gender','Birth'
                $('#wait').css('display', 'none');
                $('#showUsername').text(data[0]['UserName']);
                $('#showEmail').text(data[0]['Mail']);
                $('#showPhone').text(data[0]['Phone']);
                $('#showGender').text(data[0]['Gender']);
                $('#showBirth').text(data[0]['Birth']);
                $('#showAddress').text(data[0]['Address']);
                $('#overlayProfile').css('display', 'block');
            },
            error: function() {
                $('#wait').css('display', 'none');
                alert('something went wrong!!!');
            }
        });
    });
});
$(document).ready(function() {
    $('#offProfile').click(function() {
        $('#overlayProfile').css('display', 'none');
    })
});


//function khi người dùng muốn thay đổi password
$(document).ready(function() {
    $('#buttonChangePass').click(function() {
        let oldp = checkField("changePass", "oldPass", regPass, 2, void(0));
        let newp = checkField("changePass", "newPass", regPass, 2, void(0));
        let cnewp = checkField("changePass", "checkNewPass", regPass, 2, void(0));
        let conf = true;
        let oldPass = $('#ioldPass').val();
        let newPass = $('#inewPass').val();
        let cnewPass = $('#icheckNewPass').val();
        if (newPass != cnewPass) {
            document.getElementById("checkNewPass").style.display = "block";
            document.getElementById("checkNewPass").innerHTML = mess[3];
            conf = false;
        }
        if (oldp && newp && cnewp && conf) {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "changePassword",
                method: "post",
                data: {
                    _token: _token,
                    old: oldPass,
                    new: newPass
                },
                beforeSend: function() {
                    $('#wait').css('display', 'block');
                },
                // headers: {'X-CSRF-TOKEN': _token},
                success: function(data) {
                    $('#wait').css('display', 'none');
                    if (data == -1) {
                        setTimeout(function() {
                            alert('Mật khẩu cũ không khớp.');
                        }, 1000);
                    } else
                        setTimeout(function() {
                            alert('success change pass! hooray.');
                        }, 1000);
                },
                error: function() {
                    $('#wait').css('display', 'none');
                    alert('some thing went wrong!!!!');
                }
            });
        }
    });
});



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


// xử lý hiển thị chi tiết 1 sản phẩm
function onProductDesc() {
    $(document).ready(function() {
        // alert("ok");
        $.ajax({
            url: "productDescription",
            method: "get",
            data: {
                id: id,
                //something of one product
            },
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $('#wait').css('display', 'none');
                $("#product-description").css("display", "block");
            },
            error: function() {
                $('#wait').css('display', 'none');
                onLogin();
            }
        });

    });
}


function offProductDesc() {
    $(document).ready(function() {
        $("#product-description").css("display", "none");
    })
}

// function next ảnh

function prevImg() {
    $(document).ready(function() {
        var curr = currentSlide();
        showSlides(curr - 1);
        $('#big-img').slideUp(1).slideDown(1);
    });
}

function nextImg() {
    $(document).ready(function() {
        var curr = currentSlide();
        showSlides(curr + 1);
        $('#big-img').slideUp(1).slideDown(1);
    });
}

function showClickSlide(n) {
    $(document).ready(function() {
        showSlides(n);
        $('#big-img').slideUp(1).slideDown(1);
    });
}

function currentSlide() {
    let bigImg = $('#big-img').attr('src');
    let lengthBigImg = bigImg.length;
    let listSmallImg = $('#list-img > #small-img');
    var l = listSmallImg.length;
    var temp;
    for (var i = 0; i < l; i++) {
        temp = listSmallImg[i].src.substring(listSmallImg[i].src.length - lengthBigImg, listSmallImg[i].src.length);
        if (temp == bigImg) {
            //next ảnh nếu chưa phải ảnh cuối
            return i;
        }
    }
}

function showSlides(n) {
    $(document).ready(function() {
        var slides = $('#list-img > #small-img');
        var dots = document.getElementsByClassName("dot");
        for (var i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        if (n > slides.length - 1) {
            $('#big-img').attr('src', slides[0].src);
            dots[0].className += " active";

            return 0;
        }
        if (n < 0) {
            $('#big-img').attr('src', slides[slides.length - 1].src);
            dots[slides.length - 1].className += " active";
            return slides.length - 1;
        }
        $('#big-img').attr('src', slides[n].src);
        dots[n].className += " active";
        return n;
    });

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
            error: function() {
                alert('Something went wrong!!!!')
            }
        });
    } else {
        $(idError).css("color", "red");
        $(idError).css("display", "none");
    }
};

//function khi người dùng click vào content sẽ hiện ra sản phẩm tương ứng
function setHtml(obj) {
    var defaultHtml = '<div class="thread_list"> \
                    <div id = "single-product" class = "one-product " > \
                    <div> <a href = "javascript:void(0)" onclick = "onProductDesc()" > \
                     <img src = "insert_img" alt = "sản phẩm" title = "ấn vào để xem chi tiết" >\
                     </a> </div>\
                    <div class = "product-content" > \
                    <div class = "content" > \
                    <p class = "user" > insert_username </p>\
                    <p class = "name-product" > insert_name_product </p> \
                    </div >\ <p class = "cost"> insert_cost </p> \
                    <p> <i class = "fa fa-map-marker" > </i> insert_location </p > \ </div> </div> </div> ';
    var newHtml = '';
    for (product in obj) {
        temp = defaultHtml.replace("insert_img", obj[product]['img']);
        temp = temp.replace('insert_username', obj[product]['userName']);
        temp = temp.replace('insert_name_product', obj[product]['nameProduct']);
        temp = temp.replace('insert_cost', obj[product]['cost']);
        temp = temp.replace('insert_location', obj[product]['location']);
        newHtml += temp;
    }
    return newHtml;
}

function getProduct(name) {
    $(document).ready(function() {
        id = '#' + name;
        $(id).click(function() {
            $.ajax({
                url: "getProduct",
                method: "get",
                data: {
                    typeProduct: name
                },
                beforeSend: function() {
                    $('#wait').css('display', 'block');
                },
                // headers: {'X-CSRF-TOKEN': _token},
                success: function(data) {
                    $('#wait').css('display', 'none'); //không sửa cái này
                    // alert(data);
                    $('#row-products').html(setHtml(data));
                    // $('#row-products').html("");
                    // alert(data);
                },
                error: function() {
                    $('#wait').css('display', 'none'); //không sửa cái này
                    alert('Something went wrong!!!!')
                }
            });
        });
    });
}
getProduct('laptop');
getProduct('camera');
getProduct('keyboard');
getProduct('phone');
getProduct('book');
getProduct('tv');
getProduct('watch');
getProduct('fridge');

//function khi người dùng click xem thêm thì query thêm
$(document).ready(function() {
    $('#seeMore').click(function() {
        $.ajax({
            url: "seeMore",
            method: "get",
            data: {},
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $('#wait').css('display', 'none'); //khoogn sửa cái này
                alert(data);
                // $('#row-products').html(setHtml(data));
                // $('#row-products').html("");
                // alert(data);
            },
            error: function() {
                $('#wait').css('display', 'none'); //không sửa cái này
                onLogin();
            }
        });
    });
});


//function khi người dùng tìm kiếm một cái gì đó
//function khi người dùng tìm kiếm một cái gì đó