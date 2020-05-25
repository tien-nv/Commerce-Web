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
//fix navbar trên top
// $(document).ready(function() {
//     var nav = document.getElementById("myTopnav");
//     var sticky = nav.offsetTop;
//     $(window).scroll(function() {
//         if (window.pageYOffset >= sticky) {
//             nav_ = $('#myTopnav');
//             nav_.addClass("fix-nav");
//         } else {
//             nav_ = $('#myTopnav');
//             nav_.removeClass("fix-nav");
//         }
//     });
// });


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
                $('#view-larger').attr('href', data['Img'][0]);
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
                $('#de-cost-product').text(data['Cost'] + " vnđ");
                myHtml = "";
                for (let i = 0; i < data['Color'].length; i++) {
                    myHtml += '<option value="' + data['Color'][i] + '">' + data['Color'][i] + '</option>';
                }
                $('#product-color').html(myHtml);
                $('#total-product').text(data['Available']);
                $('#de-avai-product').html(data['Available'] + ' Sản phẩm <span>Khả dụng</span>');
                $('#sold-product').html(data['Total'] - data['Available'] + ' Sản phẩm <span>Đã bán</span>');
                for (let i = 0; i < 4; i++) {
                    let id = '#' + 'desc' + (i + 1);
                    $(id).text("");
                }
                var deText = "";
                for (let i = 0; i < data['Description'].length; i++) {
                    if (data['Description'][i].length > 0)
                        deText += data['Description'][i] + "<br>";
                }
                $('#de-desc-product').html(deText);
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

//function khi người dùng click xem thêm thì query thêm
$(document).ready(function() {
    $('#seeMore').click(function() {
        var currProducts = $('#row-products > .one-product').length;
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
        var currProducts = $('#row-products > .one-product').length;
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
        var currProducts = $('#row-products > .one-product').length;
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