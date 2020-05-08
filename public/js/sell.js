var image;
var imageBtn;
var customTxt;
var input = 0;

window.onload = function() {
    image = document.getElementById('images');
    imageBtn = document.getElementById("images-button");
    customTxt = document.getElementById("images-text");

    imageBtn.addEventListener("click", function() {
        image.click();
    });

    image.addEventListener("change", function() {
        if (image.files.length != 0) {
            customTxt.innerHTML = image.files.length + " file choosed";

        } else {
            customTxt.innerHTML = "No file chosen, yet.";
        }
    });
};

function addField() {
    input++;
    if (input <= 4) {
        var form = document.getElementById('next');
        var textbox = document.createElement('input');
        var message = document.createElement('span');

        textbox.className = "form-group col-md-6 offset-md-3";
        textbox.type = "text";
        textbox.id = "description" + input;
        textbox.name = "description" + input;
        textbox.placeholder = "Description #" + input;
        textbox.minLength = "10";
        textbox.maxLength = "100";
        textbox.required;
        message.id = "Description" + input;
        message.className = "form-group col-md-6 offset-md-3";
        var line = document.createElement('br');
        form.appendChild(message);
        form.appendChild(line);
        form.appendChild(textbox);
        return false;
    }
}


var color = [
    'red', 'green', 'blue', 'black', 'gray', 'white', 'yellow', 'pink', 'purple', 'orange'
];

var type = [
    'phone', 'laptop', 'camera', 'tv', 'fridge', 'keyboard', 'book', 'clothes', 'watch'
];

var checkName = false;
var checkColor = false;
var checkType = false;
var checkCost = false;
var checkQuantity = false;
var checkTime = false;
var isAuction = 0;

$(document).ready(function() {
    $('#sel1').click(function() {
        isAuction = $('#sel1').val();
        if (isAuction == 1) {
            $('#time').css('display', 'block');
        } else {
            $('#time').css('display', 'none');
            checkTime = false;
        }
    });
    $('#input-time').keyup(function() {
        let time = $('#input-time').val();
        if (time >= 1 && time <= 256) {
            $('#total-time').text('ổn rồi đó bro :D');
            checkTime = true;
        } else {
            $('#total-time').text("alo giá trị ko hợp lệ");
            checkTime = false;
        }
    });
    $('#input-name').keyup(function() {
        let name = $('#input-name').val();
        if (name.length > 0 && name.length < 300) {
            $('#name').text("tên đã ổn rồi đấy");
            checkName = true;
        } else {
            $('#name').text("không hợp lệ bạn eei :D");
            checkName = false;
        }
    });
    $('#input-cost').keyup(function() {
        let quantity = $('#input-cost').val();
        if (quantity >= 1000 && quantity <= 10000000000) {
            $('#cost').text("giá ổn rồi đó khéo nhầm số 0 :D");
            checkCost = true;
        } else {
            $('#cost').text("bạn eei giá ko ổn tí nào :(");
            checkCost = false;
        }
    });
    $('#input-quantity').keyup(function() {
        let quantity = $('#input-quantity').val();
        if (quantity >= 1 && quantity <= 10000) {
            $('#quantity').text('ổn rồi đó bro :D');
            checkQuantity = true;
        } else {
            $('#quantity').text("alo giá trị ko hợp lệ");
            checkQuantity = false;
        }
    });
});

$(document).ready(function() {
    $("#input-color").keyup(function() {
        let val = document.forms['sell-form']['color'].value.toLowerCase();
        let des = document.getElementById('color');
        let pos = color.indexOf(val);

        if (pos < 0) {
            des.innerHTML = "==> Màu này không hợp lệ, vui lòng điền lại";
            checkColor = false;
        } else {
            des.innerHTML = "";
            checkColor = true;
        }
    });
});

$(document).ready(function() {
    $('#input-type').keyup(function() {
        let val = document.forms['sell-form']['type'].value.toLowerCase();
        let des = document.getElementById('type');
        let pos = type.indexOf(val);
        des.innerHTML = "TYPE";
        if (pos < 0) {
            des.innerHTML = "==> Loại này không hợp lệ, vui lòng điền lại";
            checkType = false;
        } else {
            des.innerHTML = "";
            checkType = true;
        }
    });
});

$(document).ready(function() {
    $('#sell-form').on('submit', function() {

        if (checkType && checkColor && checkQuantity && checkCost && checkName) {
            if (isAuction == 1) {
                if (checkTime) {
                    return true;
                } else {
                    return false;
                }
            }
            if (isAuction == 0) {
                return true;
            }

        } else return false;

    });
});