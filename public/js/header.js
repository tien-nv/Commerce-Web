// xử lý reponsive navbar
function showNavBar() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav" || x.className === "topnav fix-nav") {
        x.className += " responsive";
        $('#iconContent').html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
    } else {
        x.className = x.className.replace(' responsive', '');
        $('#iconContent').html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
    }
}