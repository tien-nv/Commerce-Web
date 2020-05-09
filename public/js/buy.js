function remove(id) {
    $(document).ready(function() {
        $.ajax({
            url: "removeCart",
            method: "get",
            data: {
                id: id
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                $(data).html("");
            },
            error: function() {}
        });
    });
}

function pay() {
    $(document).ready(function() {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "payCart",
            method: "post",
            data: {
                _token: _token
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                if (data > 0)
                    $('#items').html("Đăng kí mua hàng thành công!!! \nhooray hàng sẽ được chuyển đến cho bạn trong 1 năm nữa");
                else
                    alert("Đã xảy ra lỗi, nếu chưa mua hàng bạn hãy quay lại mua hàng");
            },
            error: function() {}
        });
    });
}