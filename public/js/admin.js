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
                        alert(typeof(data[2]));
                    },
                    error: function() {
                        alert("something went wrong!!!!" + val[0]);
                    }
                })
            });
        }
    }
}