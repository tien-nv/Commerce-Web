function setRowHtml(obj) {
    var originHtml = ' \
    <tr class="text-white font-weight-bold" id="Product_id"> \
        <td> Product_Name </td> \
        <td> Type </td> \
        <td> Color </td> \
        <td class="text-center"> Cost VNĐ</td> \
        <td class="text-center"> Quantity </td> \
        <td class="text-center"> Auction </td> \
        <td class="text-center"> Total_time </td> \
        <td class="text-right"><button class="btn btn-sm btn-warning" onclick="addSingleProduct(Product_id)"><i class="fa fa-plus"> Add </i> </button></td> \
        <td class="text-left"><button class="btn btn-sm btn-danger" onclick="delSingleProduct(Product_id)"><i class="fa fa-trash"> Remove</i> </button></td> \
    </tr>';
    var Html = "";

    for (let i = 0; i < obj.length; i++) {
        let auction = "Không";
        Html += originHtml.replace('Product_id', obj[i]['ID']);
        Html = Html.replace('Product_Name', obj[i]['Product_Name']);
        Html = Html.replace('Type', obj[i]['Type']);
        Html = Html.replace('Color', obj[i]['Color']);
        Html = Html.replace('Cost', obj[i]['Cost']);
        Html = Html.replace('Quantity', obj[i]['Quantity']);
        if (obj[i]['Is_Auction'] == 1) auction = "Có";
        Html = Html.replace('Auction', auction);
        Html = Html.replace('Total_time', obj[i]['Time_Total']);
        Html = Html.replace('Product_id', obj[i]['ID']);
        Html = Html.replace('Product_id', obj[i]['ID']);
    }
    return Html;
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
//function lấy sản phẩm từ bảng seller
$(document).ready(function() {
    $('#getProduct').click(function() {
        $.ajax({
            url: "getSellProduct",
            method: "GET",
            data: {},
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            success: function(data) {
                $('#wait').css('display', 'none');
                let content = '<tr class="text-warning">\
                <th> Tên Sản phâm</th>\
                <th> Loại Sản phẩm </th>\
                <th> Màu sắc </th>\
                <th> Giá cả </th>\
                <th class="text-center"> Số lượng </th>\
                <th class="text-center"> Đấu giá </th>\
                <th class="text-center"> Thời gian đấu giá</th>\
                <th> </th>\
                <th> </th>\
            </tr>';
                $('#table-product').html(content + setRowHtml(data));
            },
            error: function() {
                $('#wait').css('display', 'none');
                alert("something went wrong!!!!");
            }
        })
    })
});
//fucntion để thêm từng sản phẩm 1
function addSingleProduct(id) {
    $(document).ready(function() {
        $.ajax({
            url: "addSingleProduct",
            method: "GET",
            data: {
                id: id
            },
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            success: function(data) {
                $('#wait').css('display', 'none');
                $(('#' + id)).html("");
                alert("Đã cập nhật thành công " + data + " sản phẩm!!!hooray ");
            },
            error: function() {
                $('#wait').css('display', 'none');
                alert("something went wrong!!!!");
            }
        })
    });
}



//function để xoas từng sản phẩm 1
function delSingleProduct(id) {
    $(document).ready(function() {
        $.ajax({
            url: "delSingleProduct",
            method: "GET",
            data: {
                id: id
            },
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            success: function(data) {
                $('#wait').css('display', 'none');
                $(('#' + id)).html("");
                alert("Đã xóa thành công " + data + " sản phẩm!!!hooray ");
            },
            error: function() {
                $('#wait').css('display', 'none');
                alert("something went wrong!!!!");
            }
        })
    });
}
//function để thêm từng sản phẩm 1
//<!-- this script để lấy giá trị sản phẩm trả về cho server -->
//xong

$(document).ready(function() {
    // var _token = $('input[name="_token"]').val();
    $('#addAllProduct').click(function() {
        $.ajax({
            url: "addAllProduct",
            method: "GET",
            data: {},
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            success: function(data) {
                $('#wait').css('display', 'none');
                alert("Đã thêm thành công " + data + " sản phẩm vào bảng hàng chính!!! hooray");
            },
            error: function() {
                $('#wait').css('display', 'none');
                alert("something went wrong!!!!");
            }
        });
    });
    $('#deleteAllProduct').click(function() {
        $.ajax({
            url: "delAllProduct",
            method: "GET",
            data: {},
            beforeSend: function() {
                $('#wait').css('display', 'block');
            },
            success: function(data) {
                $('#wait').css('display', 'none');
                $('#table-product').html("");
                alert("Đã xóa thành công " + data + " ở cơ sở dữ liệu!!! hooray");
            },
            error: function() {
                $('#wait').css('display', 'none');
                alert("something went wrong!!!!");
            }
        })
    });
});


//function để xóa tất cả sản phẩm



//<!-- this script để lấy giá trị tên admin và password để register -->
function checkConflic() {
    $(document).ready(function() {
        var inputVal = $("#inputAdminName").val();
        if (inputVal.length > 0) {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "adminInputRegister",
                method: "post",
                data: {
                    _token: _token,
                    inputVal: inputVal
                },
                // headers: {'X-CSRF-TOKEN': _token},
                success: function(data) {
                    $('#adminRegister').css("display", "block");
                    if (data == 0) {
                        // alert("ok");
                        $('#adminRegister').css("color", "red");
                        $('#adminRegister').text("Đã tồn tại cái này :)");
                        $('#registerAdminForm').attr('onsubmit', 'false');
                    } else {
                        $('#adminRegister').css("color", "green");
                        $('#adminRegister').text('Cái này chưa xuất hiện nè nên hợp lệ <3');
                        $('#registerAdminForm').attr('onsubmit', 'return validateAdminRegister()');
                    }
                },
                error: function() {
                    alert('Something went wrong!!!!')
                }
            });
        } else {
            $("#adminRegister").css("color", "red");
            $("#adminRegister").css("display", "none");
        }
    });
}

$(document).ready(function() {
    $('#submitRegister').click(function() {
        var adminName = $("#inputAdminName").val();
        var password = $("#inputPasswordRegister").val();
        if (!validateAdminRegister()) return;
        if ($('#registerAdminForm').attr('onsubmit') == false) return;
        var _token = $('input[name="_token"]').val();
        var h_pass = CryptoJS.MD5(password).toString();
        $.ajax({
            url: "adminRegister",
            method: "post",
            data: {
                _token: _token,
                adminName: adminName,
                password: h_pass
            },
            beforeSend: function() {
                $('#wait').css('display', 'block'); //đồng bộ khi load
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $('#wait').css('display', 'none'); //không động vào cái này
                if (data == 1)
                    alert("Thêm admin thành công hooray!!!! <3");
                else alert("something went wrong!!!");
            },
            error: function() {
                $('#wait').css('display', 'none'); //không động vào cái này
                alert('Something went wrong!!!! ');
            }
        });
    })
});


//script để xóa admin đã được chọn
$(document).ready(function() {
    $('#delAdmin').click(function() {
        let id = $('#sel4').val();
        if (id == '') {
            alert("chưa chọn admin");
        } else {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "removeAdmin",
                method: "POST",
                data: {
                    _token: _token,
                    id: id
                },
                beforeSend: function() {
                    $('#wait').css('display', 'block'); //đồng bộ khi load
                },
                success: function(data) {
                    $('#wait').css('display', 'none');
                    if (data == '1')
                        alert("success remove admin!!!! hooray");
                    else
                        alert("Admin not invalid :(");
                },
                error: function() {
                    $('#wait').css('display', 'none');
                    alert("something went wrong!!!!");
                }
            })
        }
    })
});

$(document).ready(function() {
    $('#refresh').click(function() {
        var _token = $('input[name="_token"]').val();
        $('#progress').css('display', 'block');
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            url: "getAdmin",
            method: "POST",
            data: {
                _token: _token
            },
            beforeSend: function() {
                $(".progress-bar").width('0%');
            },
            success: function(data) {
                var myHtml = '<option value="" aria-checked="true">Xóa 1 admin</option>';
                for (admin in data) {
                    myHtml += '<option value="' + data[admin]['Admin_ID'] + '">' + data[admin]['Admin_Name'] + '</option>';
                }
                $('#sel4').html(myHtml);
                setTimeout(function() {
                    $('#progress').css('display', 'none');
                }, 1500)
            },
            error: function() {
                alert("something went wrong!!!!");
            }
        })
    });
});