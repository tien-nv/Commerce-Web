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
                let myHtml = '<tr><th>Mã đơn hàng</th><th>Tên sản phẩm</th><th>Đơn giá(VNĐ)</th><th>Số lượng</th><th>Tổng tiền</th><th>Thời gian giao dịch</th></tr>';
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
    $('#show-sell').click(function() {
        $('#show-sell').css('display', 'none');
        $('#sell-detail').css('display', 'block');
        $.ajax({
            url: "soldProduct",
            method: "get",
            data: {},
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $('#wait').css('display', 'none'); //khoogn sửa cái này
                let temp = "<tr>[mask]</tr>";
                let myHtml = '<tr><th>Mã sản phẩm</th><th>Tên sản phẩm</th><th>Loại sản phẩm</th><th>Đơn giá(VNĐ)</th><th>Số lượng</th><th>Màu sắc</th><th>Đấu giá</th><th>Thời gian được duyệt</th></tr>';
                for (let i = 0; i < data.length; i++) {
                    let tmp = "";
                    for (field in data[i]) {
                        tmp += '<td>' + data[i][field] + '</td>';
                    }
                    myHtml += temp.replace('[mask]', tmp);
                }
                $('#get-detail-sell').html(myHtml);
            },
            error: function() {
                $('#wait').css('display', 'none'); //không sửa cái này
            }
        });
    });
    $('#off-sell').click(function() {
        $('#show-sell').css('display', 'block');
        $('#sell-detail').css('display', 'none');
    });
});


// function next ảnh

function prevImg() {
    $(document).ready(function() {
        var curr = currentSlide();
        showSlides(curr - 1);
    });
}

function nextImg() {
    $(document).ready(function() {
        var curr = currentSlide();
        showSlides(curr + 1);
    });
}

function showClickSlide(n) {
    $(document).ready(function() {
        showSlides(n);
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
            $('#view-larger').attr('href', slides[0].src);
            dots[0].className += " active";

            return 0;
        }
        if (n < 0) {
            $('#big-img').attr('src', slides[slides.length - 1].src);
            $('#view-larger').attr('href', slides[slides.length - 1].src);
            dots[slides.length - 1].className += " active";
            return slides.length - 1;
        }
        $('#big-img').attr('src', slides[n].src);
        $('#view-larger').attr('href', slides[n].src);
        dots[n].className += " active";
        return n;
    });

}


//function khi người dùng click vào content sẽ hiện ra sản phẩm tương ứng
function setHtml(obj) {
    var defaultHtml = '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 one-product">\
    <div class="item">\
    <div class="single-product-item">\
        <div class="product-image">\
            <a href="javascript:void(0)">\
                <img src="insert_img" alt="product-image" />\
            </a>\
            <a href="#" class="new-mark-box" title="Người bán">insert_username</a>\
            <div class="overlay-content">\
                <ul>\
                    <li><a href="javascript:void(0)" onclick="onProductDesc(insert_id)" id="link-img-product" title="Quick view"><i class="fa fa-search"></i></a></li>\
                    <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>\
                    <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>\
                    <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>\
                </ul>\
            </div>\
        </div>\
        <div class="product-info">\
            <div class="customar-comments-box">\
                <div class="rating-box">\
                    <i class="fa fa-star"></i>\
                    <i class="fa fa-star"></i>\
                    <i class="fa fa-star"></i>\
                    <i class="fa fa-star"></i>\
                    <i class="fa fa-star-half-empty"></i>\
                </div>\
                <div class="review-box">\
                    <span>1 Review (s)</span>\
                </div>\
            </div>\
            <a href="javascript:void(0)" onclick="onProductDesc(insert_id)">insert_name_product</a>\
            <div class="price-box">\
                <span class="price">insert_cost <span class="price">vnđ</span></span>\
            </div>\
        </div>\
    </div>\
</div>\
</div>';
    var newHtml = '';
    for (let i = 0; i < obj.length; i++) {
        temp = defaultHtml.replace("insert_img", obj[i]['Img']);
        temp = temp.replace("insert_id", obj[i]['Product_ID']);
        temp = temp.replace('insert_username', obj[i]['Seller']);
        temp = temp.replace('insert_name_product', obj[i]['Product_Name']);
        temp = temp.replace('insert_cost', obj[i]['Cost']);
        temp = temp.replace("insert_id", obj[i]['Product_ID']);
        temp = temp.replace('insert_location', ' Hà Nội');
        if (obj[i]['auction'] == 1) {
            temp = temp.replace('onProductDesc', 'onProductAuction');
            temp = temp.replace('onProductDesc', 'onProductAuction');
        }
        newHtml += temp;
    }
    return newHtml;
}

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
                $('#order-total').text("");
                alert(data);
            },
            error: function() {
                $('#wait').css('display', 'none');
            }
        });
    })
});