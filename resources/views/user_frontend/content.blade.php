<div class="topnav" id="myTopnav">
    <a href="{{ route('/') }}" id="all"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a>
    <div class="my-drop">
        <a href="javascript:void(0)"><i class="fa fa-rss" aria-hidden="true"></i> Công nghệ</a>
        <div class="topnav-dropdown-content">
            <div class="mega-menu-list">
                <div class="mega-list">
                    <span>&#60;&#47;</span>
                    <a href="javascript:void(0)" id="laptop">Laptop</a>
                    <span>&#62;</span>
                </div>
                <div class="mega-list">
                    <span>&#60;&#47;</span>
                    <a href="javascript:void(0)" id="camera">Camera</a>
                    <span>&#62;</span>
                </div>
                <div class="mega-list">
                    <span>&#60;&#47;</span>
                    <a href="javascript:void(0)" id="keyboard">keyboard</a>
                    <span>&#62;</span>
                </div>
                <div class="mega-list">
                    <span>&#60;&#47;</span>
                    <a href="javascript:void(0)" id="phone">phone</a>
                    <span>&#62;</span>
                </div>
            </div>
        </div>
    </div>
    <div class="my-drop">
        <a href="javascript:void(0)"><i class="fa fa-book" aria-hidden="true"></i> Tri thức</a>
        <div class="topnav-dropdown-content">
            <div class="mega-menu-list">
                <div class="mega-list">
                    <span>&#60;&#47;</span>
                    <a href="javascript:void(0)" id="book">Books</a>
                    <span>&#62;</span>
                </div>
            </div>
        </div>
    </div>
    <div class="my-drop">
        <a href="javascript:void(0)"><i class="fa fa-bookmark" aria-hidden="true"></i> Thời trang</a>
        <div class="topnav-dropdown-content">
            <div class="mega-menu-list">
                <div class="mega-list">
                    <span>&#60;&#47;</span>
                    <a href="javascript:void(0)" id="tv">Television</a>
                    <span>&#62;</span>
                </div>
                <div class="mega-list">
                    <span>&#60;&#47;</span>
                    <a href="javascript:void(0)" id="watch">Watch</a>
                    <span>&#62;</span>
                </div>
                <div class="mega-list">
                    <span>&#60;&#47;</span>
                    <a href="javascript:void(0)" id="fridge">Fridge</a>
                    <span>&#62;</span>
                </div>
            </div>
        </div>
    </div>
    <div class="my-drop">
        <a href="javascript:void(0)"><i class="fa fa-info" aria-hidden="true"></i> Khác</a>
        <div class="topnav-dropdown-content">
            <div class="mega-menu-list">
                <div class="mega-list">
                    <span>&#60;&#47;</span>
                    <a href="javascript:void(0)">Đang cập nhật</a>
                    <span>&#62;</span>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('auction') }}" style="margin-left:0;"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Đấu giá</a>
    <a href="{{ route('showCart') }}" class="shop-cart" title="View shopping cart">
        <i class="fa fa-shopping-cart cart-icon"></i>
        <b>Giỏ hàng</b>
    </a>
    <a href="javascript:void(0)" id="iconContent" class="icon" onclick="showNavBar()">
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </a>
</div>