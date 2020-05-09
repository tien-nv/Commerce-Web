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
    })
}