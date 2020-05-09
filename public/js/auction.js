var myTimeout;
var updateCostTime = 0;

function onProductAuction(id) {
    $(document).ready(function() {
        // alert("ok");
        $.ajax({
            url: "productDescriptionAuction",
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
                $('.show-infor').attr('id', data['Product_ID']);
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
                $('#de-cost-product').text(data['Cost']);
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
                // $('#desc1').text(data['Description1']);
                //tính toán truyền tham số thời gian còn lại vào đây để hiện thị đếm ngược
                let h = data['h'];
                let m = data['m'];
                let s = data['s'];
                $('#de-time-left').html('Time left: <span id="de-time-left-h" style="font-size: 25px; "></span>:<span id="de-time-left-m" style="font-size: 25px;"></span>:<span id="de-time-left-s" style="font-size: 25px;"></span>');
                start(h, m, s);
                $("#product-auction").css("display", "block");
            },
            error: function() {
                $('#wait').css('display', 'none');
                alert('some thing went wrong!!!');
            }
        });

    });
}

function offProductAuction() {
    $(document).ready(function() {
        $("#product-auction").css("display", "none");
        $('#warning').text("");
        $('#auction-cost').val("");
        clearTimeout(myTimeout);
    })
}


//function hiển thị đồng hồ đếm ngược
function start(h, m, s) {

    s--;
    // Nếu số giây = -1 tức là đã chạy ngược hết số giây, lúc này:
    //  - giảm số phút xuống 1 đơn vị
    //  - thiết lập số giây lại 59
    if (s === -1) {
        m -= 1;
        s = 59;
    }

    // Nếu số phút = -1 tức là đã chạy ngược hết số phút, lúc này:
    //  - giảm số giờ xuống 1 đơn vị
    //  - thiết lập số phút lại 59
    if (m === -1) {
        h -= 1;
        m = 59;
    }

    // Nếu số giờ = -1 tức là đã hết giờ, lúc này:
    //  - Dừng chương trình
    if (h == -1) {
        // clearTimeout(timeout);
        $('#de-time-left').html("Time left: Kết thúc.");
        $('#de-time-left').attr('check', '0');
        return false;
    }
    //mỗi 3s gửi request 1 lần cập nhật giá
    if ($('#product-auction').css("display") == 'block' && (updateCostTime % 3 == 0)) {
        var id = $('.show-infor').attr('id');
        $.ajax({
            url: "updateCost",
            method: "get",
            data: {
                id: id,
                //something of one product
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $('#de-cost-product').text(data);
            },
            error: function() {
                // alert('some thing went wrong!!!');
            }
        });

    }

    /*HIỂN THỊ ĐỒNG HỒ*/
    $('#de-time-left-h').text(h.toString());
    $('#de-time-left-m').text(m.toString());
    $('#de-time-left-s').text(s.toString());

    /*đệ quy*/
    myTimeout = setTimeout(function() {
        updateCostTime += 1;
        updateCostTime %= 3;
        start(h, m, s);
    }, 1000);
}


$(document).ready(function() {
    $('#push-cost').click(function() {
        var cost = $('#auction-cost').val();
        var id = $('.show-infor').attr('id');
        if (!cost) {
            $('#warning').text("Hãy điền giá tiền :D");
        } else {
            $('#warning').text("");
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "pushCost",
                method: "post",
                data: {
                    _token: _token,
                    cost: cost,
                    id: id
                        //something of one product
                },
                beforeSend: function() {
                    $('#wait').css('display', 'block');
                },
                // headers: {'X-CSRF-TOKEN': _token},
                success: function(data) {
                    $('#wait').css('display', 'none');
                    $('#warning').text(data);
                },
                error: function() {
                    $('#wait').css('display', 'none');
                    alert('some thing went wrong!!!');
                }
            });
        }
    });
})