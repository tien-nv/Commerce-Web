var myMessTimeout;

function startGetMess() {
    //mỗi 1s gửi request 1 lần cập nhật tin nhắn
    if ($('#frame-chat').css("display") == 'block') {
        $.ajax({
            url: "getMess",
            method: "get",
            data: {
            },
            success: function (data) {
                $('#message').html("");
                for (var i = data.length - 1; i >= 0; i--) {
                    if (data[i]['Status'] != 2) {
                        myHtml = '<div class="col-lg-12 col-xs-12 col-md-12 col-xl-12 col-sm-12">\
                        <div class="user-mess">\
                            <span>' + data[i]['Message'] + ' </span>\
                        </div>\
                        </div>';
                        $('#message').append(myHtml);
                    } else {
                        myHtml = '<div class="col-lg-12 col-xs-12 col-md-12 col-xl-12 col-sm-12">\
                        <div class="admin-mess">\
                            <span>' + data[i]['Message'] + ' </span>\
                        </div>\
                        </div>';
                        $('#message').append(myHtml);
                    }
                }
                
            },
            error: function () {
                // alert("something went wrong!!!!");
            }
        })

        /*đệ quy*/
        myMessTimeout = setTimeout(function () {
            startGetMess();
        }, 1000);
    }
}

$(document).ready(function () {
    $('#show-chat').click(function () {
        $('#show-chat').css('display', 'none');
        $('#frame-chat').css('display', 'block');
        //tạo lập request
        startGetMess();
    });
});

$(document).ready(function () {
    $('#send-mess').click(function () {
        var mess = $('#mess-text').val();
        if (mess.length <= 0) return false;
        else {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "sendMess",
                method: "post",
                data: {
                    _token: _token,
                    mess: mess
                },
                success: function (data) {
                    myHtml = '<div class="col-lg-12 col-xs-12 col-md-12 col-xl-12 col-sm-12">\
                            <div class="user-mess">\
                                <span>' + mess + ' </span>\
                            </div>\
                            </div>';
                    $('#message').append(myHtml);
                    $('#message').scrollTop($('#message').height());
                    $('#mess-text').val('');
                },
                error: function () {
                    alert("something went wrong!!!!");
                }
            })
        }
    });
})

function exitChat() {
    $('#show-chat').css('display', 'block');
    $('#frame-chat').css('display', 'none');
    clearTimeout(myMessTimeout);
    //đóng request
}
