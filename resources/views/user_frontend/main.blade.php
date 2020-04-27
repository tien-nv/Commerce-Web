<section class="main-component">
    <div class="fillter"></div>
    <!-- chỗ này bị bug dùng js để show nếu mà màn hình nhỏ thì show 2 sản phẩm 1 dòng
    còn nếu màn hình lớn thì show 5 sản phẩm 1 dòng, màn hình trung bình thì show 3 sản phẩm-->
    <div class="container">
        <!-- một vòng for để show hàng của các sản phẩm -->
        <div id="row-products" class="products">
            <!-- một vòng for để show sản phẩm một row là -->
            @for($i = 0;$i < 10;$i++)
            <div class="thread_list">
                <div id="single-product" class="one-product ">
                    <!-- div show ảnh -->
                    <div>
                        <!-- thay các biến bắng {{}} -->
                        <a href="#"><img src="img\\product1.jpg" alt="sản phẩm"></a> 
                    </div>
                    <!-- div show tiêu đề -->
                    <div class="product-content">
                        <div class="content">
                            <!-- thay biến -->
                            <p class="user">username người bán</p>
                            <!-- thay biến -->
                            <p class="name-product">tên sản phẩm</p>
                        </div>
                        <!-- thay biến -->
                        <p class="cost">2.000.000 vnd</p>
                        <!-- thay biến -->
                        <p><i class="fa fa-map-marker"></i>Hà nội</p>
                    </div>
                </div>
            </div>
            @endfor
            <div class="thread_list">
                <div id="single-product" class="one-product ">
                    <!-- div show ảnh -->
                    <div>
                        <img src="img\\product1.jpg" alt="sản phẩm">
                    </div>
                    <!-- div show tiêu đề -->
                    <div class="product-content">
                        <div class="content">
                            <p class="user">username người bán</p>
                            <p class="name-product">tên sản phẩm</p>
                        </div>
                        <p class="cost">2.000.000 vnd</p>
                        <p><i class="fa fa-map-marker"></i>Hà nội</p>
                    </div>
                </div>
            </div>
            <div class="thread_list">
                <div id="single-product" class="one-product ">
                    <!-- div show ảnh -->
                    <div>
                        <img src="img\\product1.jpg" alt="sản phẩm">
                    </div>
                    <!-- div show tiêu đề -->
                    <div class="product-content">
                        <div class="content">
                            <p class="user">username người bán</p>
                            <p class="name-product">tên sản phẩm</p>
                        </div>
                        <p class="cost">2.000.000</p>
                        <p><i class="fa fa-map-marker"></i>Hà nội</p>
                    </div>
                </div>
            </div>
            <div class="thread_list">
                <div id="single-product" class="one-product ">
                    <!-- div show ảnh -->
                    <div>
                        <img src="img\\product1.jpg" alt="sản phẩm">
                    </div>
                    <!-- div show tiêu đề -->
                    <div class="product-content">
                        <div class="content">
                            <p class="user">username người bán</p>
                            <p class="name-product">tên sản phẩm</p>
                        </div>
                        <p class="cost">2.000.000</p>
                        <p><i class="fa fa-map-marker"></i>Hà nội</p>
                    </div>
                </div>
            </div>
            <div class="thread_list">
                <div id="single-product" class="one-product ">
                    <!-- div show ảnh -->
                    <div>
                        <img src="img\\product2.jpg" alt="sản phẩm">
                    </div>
                    <!-- div show tiêu đề -->
                    <div class="product-content">
                        <div class="content">
                            <p class="user">username người bán</p>
                            <p class="name-product">tên sản phẩm</p>
                        </div>
                        <p class="cost">2.000.000</p>
                        <p><i class="fa fa-map-marker"></i>Hà nội</p>
                    </div>
                </div>
            </div>
            <div class="thread_list">
                <div id="single-product" class="one-product ">
                    <!-- div show ảnh -->
                    <div>
                        <img src="img\\product1.jpg" alt="sản phẩm">
                    </div>
                    <!-- div show tiêu đề -->
                    <div class="product-content">
                        <div class="content">
                            <p class="user">username người bán</p>
                            <p class="name-product">tên sản phẩm</p>
                        </div>
                        <p class="cost">2.000.000</p>
                        <p><i class="fa fa-map-marker"></i>Hà nội</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="other">
            <button type="button" class="btn btn-dark" id="seeMore" onclick="">XEM THÊM</button>
        </div>
    </div>
</section>