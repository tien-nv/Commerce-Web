$(document).ready(function() {
    var nav = $('#myTopnav');

    $(window).scroll(function() {
        if ($(this).scrollTop() > 10) {
            nav.addClass("fix-nav");
            $('#goTop').css('display', 'block').fadeIn(3000);
        } else {
            nav.removeClass("fix-nav");
            $('#goTop').css('display', 'none');
        }
    });
});


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
    if (x.className === "topnav" || x.className === "topnav fix-nav") {
        x.className += " responsive";
        $('#iconContent').html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
    } else {
        x.className = x.className.replace(' responsive', '');
        $('#iconContent').html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
    }
}


// xử lý hiển thị chi tiết 1 sản phẩm
function onProductDesc(id) {
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
                $('#big-img').attr('src', data['Img'][0]);
                let myHtml = "";
                let myHtmlDot = "";
                for (let i = 0; i < data['Img'].length; i++) {
                    myHtml += '<img id = "small-img" src = "' + data['Img'][i] + '" alt = "Sản phẩm " title = "Sản phẩm: )" > ';
                    if (i == 0) {
                        myHtmlDot += '<span class="dot active" onclick="showClickSlide(' + i + ')"></span>';
                    } else {
                        myHtmlDot += '<span class="dot" onclick="showClickSlide(' + i + ')"></span>';
                    }
                }
                $('#list-img').html(myHtml);
                $('#list-dot').html(myHtmlDot);
                $('#de-name-product').text(data['Product_Name']);
                $('#de-cost-product').text("Giá tiền: " + data['Cost'] + " vnđ");
                myHtml = "";
                for (let i = 0; i < data['Color'].length; i++) {
                    myHtml += '<option value="' + data['Color'][i] + '">' + data['Color'][i] + '</option>';
                }
                $('#product-color').html(myHtml);
                $('#total-product').text(data['Total']);
                $('#sold-product').text(data['Sold']);
                for (let i = 0; i < 4; i++) {
                    let id = '#' + 'desc' + (i + 1);
                    $(id).text("");
                }
                for (let i = 0; i < data['Description'].length; i++) {
                    let id = '#' + 'desc' + (i + 1);
                    $(id).text(data['Description'][i]);
                }
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
            error: function() {}
        });
    } else {
        $(idError).css("color", "red");
        $(idError).css("display", "none");
    }
};

//function khi người dùng click vào content sẽ hiện ra sản phẩm tương ứng
function setHtml(obj) {
    var defaultHtml = '<div class="thread_list"> \
    <a href = "javascript:void(0)" onclick = "onProductDesc(insert_id)" >\
                    <div id = "single-product" class = "one-product " > \
                    <div class = "product-content" > \
                    <div class = "content" > \
                    <p class = "user" ><span>Người bán:</span> insert_username </p>\
                    <p class = "name-product" > insert_name_product </p></div> \
                     <p class = "cost"><span>Giá tiền:</span> insert_cost <span> vnđ</span></p> \
                    <p> <i class = "fa fa-map-marker" > </i> insert_location </p > </div> \
                    <div>  \
                     <img src = "insert_img" alt = "sản phẩm" title = "ấn vào để xem chi tiết" >\
                     </div></div>\
                     </a> </div> ';
    var newHtml = '';
    for (let i = 0; i < obj.length; i++) {
        temp = defaultHtml.replace("insert_img", obj[i]['Img']);
        temp = temp.replace("insert_id", obj[i]['Product_ID']);
        temp = temp.replace('insert_username', obj[i]['Seller']);
        temp = temp.replace('insert_name_product', obj[i]['Product_Name']);
        temp = temp.replace('insert_cost', obj[i]['Cost']);
        temp = temp.replace('insert_location', ' Hà Nội');
        if (obj[i]['auction'] == 1) {
            temp = temp.replace('onProductDesc', 'onProductAuction');
        }
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
                    onLogin();
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
        var currProducts = $('#row-products > .thread_list').length;
        $.ajax({
            url: "seeMore",
            method: "get",
            data: {
                currProducts: currProducts
            },
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $('#wait').css('display', 'none'); //khoogn sửa cái này
                $('#row-products').html(setHtml(data));
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

//function khi người dùng muốn filter theo mới nhất
$(document).ready(function() {
    $('#sortNewest').click(function() {
        var currProducts = $('#row-products > .thread_list').length;
        $.ajax({
            url: "sortNewest",
            method: "get",
            data: {
                currProducts: currProducts
            },
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $('#wait').css('display', 'none'); //khoogn sửa cái này
                $('#row-products').html(setHtml(data));
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
//function khi người dùng muốn filter theo giá tiền
$(document).ready(function() {
    $('#sortCheapest').click(function() {
        var currProducts = $('#row-products > .thread_list').length;
        $.ajax({
            url: "sortCheapest",
            method: "get",
            data: {
                currProducts: currProducts
            },
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $('#wait').css('display', 'none'); //khoogn sửa cái này
                $('#row-products').html(setHtml(data));
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
$(document).ready(function() {
    $('#search').keyup(function() {
        var search = $('#search').val();
        var type = $('#category').val();
        if (search.length == 0) {
            $('.search-recommend').css('display', 'none');
            return false;
        }
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "search",
            method: "post",
            data: {
                _token: _token,
                key: search,
                type: type
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                let len = Math.min(data.length, 9);
                if (len > 0) {
                    let myHtml = "";
                    for (let i = 0; i < len; i++) {
                        myHtml += '<div><a href="javascript:void(0)" id="' + data[i]['Product_ID'] + '" class="recommend" onclick()="setRecommend()">' + data[i]['Product_Name'] + '</a></div>'
                    }
                    $('#search-recommend').html(myHtml);
                    $('.search-recommend').css('display', 'block');
                    var commends = document.getElementsByClassName('recommend');
                    for (let i = 0; i < commends.length; i++) {
                        let id = '#' + commends[i].getAttribute('id');
                        $(id).mouseover(function() {
                            $('#search').val($(id).text());
                        });
                    }
                } else {
                    $('#search-recommend').html("");
                }
            },
            error: function() {}
        });

    });

});


//function tìm kiếm sản phẩm
$(document).ready(function() {
    $('#search').focus(function() {
        var search = $('#search').val();
        if (search.length > 0) {
            $('.search-recommend').css('display', 'block');
        }
    });
    $('#search').focusout(function() {
        $('.search-recommend').css('display', 'none');
    });
    $('#search-button').click(function() {
        var search = $('#search').val();
        var type = $('#category').val();
        if (search.length == 0) {
            $('.search-recommend').css('display', 'none');
            return false;
        }
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "search",
            method: "post",
            data: {
                _token: _token,
                key: search,
                type: type
            },
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $('#wait').css('display', 'none');
                if (data.length > 0) {
                    $('#row-products').html(setHtml(data));
                } else {
                    $('#row-products').html('Cửa hàng thông báo: sản phẩm đã hết hoặc không có!!! :(');
                    $('#row-products').css('color', 'white');
                }
            },
            error: function() {
                $('#wait').css('display', 'none');
            }
        });
    });
});


//function add to cart
$(document).ready(function() {
    // $('#getTotal').keypress(function() {
    //     var total = $('#getTotal').val();
    //     $('#order-total').text('Hãy điền đầy đủ thông tin!!!');
    // }); //hiển thị số tiền
    $('#add-to-cart').click(function() {
        var total = $('#getTotal').val();
        if (!total) {
            $('#order-total').text('Hãy điền đầy đủ thông tin!!!');
            return false;
        }
        if (total > $('#total-product') || total <= 0) {
            $('#order-total').text('Số lượng không hợp lệ!!!!');
            return false;
        }
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "addToCart",
            method: "post",
            data: {
                _token: _token,
                total: total
            },
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $('#wait').css('display', 'none');
                alert(data);
            },
            error: function() {
                $('#wait').css('display', 'none');
            }
        });
    })
});


//function xem đơn hàng
$(document).ready(function() {
    $('#show-order').click(function() {
        $('#show-order').css('display', 'none');
        $('#order-detail').css('display', 'block');
        $.ajax({
            url: "boughtProduct",
            method: "get",
            data: {},
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $('#wait').css('display', 'none'); //khoogn sửa cái này
                let temp = "<tr>[mask]</tr>";
                let myHtml = '<tr><th>Mã đơn hàng</th><th>Tên sản phẩm</th><th>Đơn giá</th><th>Số lượng</th><th>Tổng tiền</th><th>Thời gian giao dịch</th></tr>';
                for (let i = 0; i < data.length; i++) {
                    let tmp = "";
                    for (field in data[i]) {
                        tmp += '<td>' + data[i][field] + '</td>';
                    }
                    myHtml += temp.replace('[mask]', tmp);
                }
                $('#get-detail').html(myHtml);
            },
            error: function() {
                $('#wait').css('display', 'none'); //không sửa cái này
            }
        });
    });
    $('#off-order').click(function() {
        $('#show-order').css('display', 'block');
        $('#order-detail').css('display', 'none');
    });
});