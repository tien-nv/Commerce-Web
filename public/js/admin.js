//<!-- this script để lấy giá trị sản phẩm trả về cho server -->
function showValue(id) {
    let element = '#' + id;
    let query = '#' + id + ' option:checked';
    let selected = document.querySelectorAll(query);
    var val = Array.from(selected).map(el => el.value);
    if (val.length == 0) alert("hãy chọn sản phẩm");
    else { //send request về server theo dạng ajax
        if (id === 'sel1') {
            $(document).ready(function() {
                // var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "addProduct",
                    method: "GET",
                    data: { selected: val },
                    success: function(data) {
                        alert(data[0].Admin_Name);
                    },
                    error: function() {
                        alert("something went wrong!!!!" + val[0]);
                    }
                })
            });
        }
    }
}

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
        $.ajax({
            url: "adminRegister",
            method: "post",
            data: {
                _token: _token,
                adminName: adminName,
                password: password
            },
            // headers: {'X-CSRF-TOKEN': _token},
            success: function(data) {
                if (data == 1)
                    alert("Thêm admin thành công hooray!!!! <3");
                else alert("something went wrong!!!");
            },
            error: function() {
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
            alert(id);
            $.ajax({
                url: "removeAdmin",
                method: "POST",
                data: {
                    _token: _token,
                    id: id
                },
                success: function(data) {
                    if (data == '1')
                        alert("success remove admin!!!! hooray");
                    else
                        alert("Admin not invalid :(");
                },
                error: function() {
                    alert("something went wrong!!!!");
                }
            })
        }
    })
});

$(document).ready(function() {
    $('#sel4').click(function() {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "getAdmin",
            method: "POST",
            data: {
                _token: _token
            },
            success: function(data) {
                var myHtml = '<option value="" aria-checked="true">Xóa 1 admin</option>';
                for (admin in data) {
                    myHtml += '<option value="' + data[admin]['Admin_ID'] + '">' + data[admin]['Admin_Name'] + '</option>';
                }
                $('#sel4').html(myHtml);
            },
            error: function() {
                alert("something went wrong!!!!");
            }
        })
    });
});