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
                        <a href="javascript:void(0)" onclick="onProductDesc()"><img src="img\\product1.jpg" alt="sản phẩm"></a>
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
                    <a href="javascript:void(0)" onclick="onProductDesc()"><img src="img\\product1.jpg" alt="sản phẩm"></a>
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
    <div class="product-description" id="product-description">
        <div class="formProductPopup">
            <i class="fa fa-times" onclick="offProductDesc()"></i>
            <div class="show-img">
                <!-- truyền biến -->
                <img src="img/product1.jpg" alt="Sản phẩm" title="Sản phẩm :)">
                <div class="more-img">
                    <i class="fa fa-caret-left" onclick=""></i>
                    <!-- chỗ này truyền các biến tương ứng với từng ảnh -->
                    <img src="img/product1.jpg" alt="Sản phẩm" title="Sản phẩm :)">
                    <img src="img/product1.jpg" alt="Sản phẩm" title="Sản phẩm :)">
                    <img src="img/product1.jpg" alt="Sản phẩm" title="Sản phẩm :)">
                    <i class="fa fa-caret-right" onclick=""></i>
                </div>
            </div>
            <div class="show-infor">
                <div class="name-product">Tên sản phẩm</div>
                <div class="cost">2.000.000</div>
                <div class="color">
                    <label for="product-color">Màu sắc: </label>
                    <select name="product-color" id="product-color" class="form-control">
                        <option value="red">red</option>
                        <option value="blue">blue</option>
                    </select>
                </div>
                <div class="total">Số lượng: 1</div>
                <div class="other">
                    <p>Một số mô tả khác mô tả 1</p>
                    <p>Một số mô tả khác mô tả 2</p>
                </div>
                <div class="buy">
                    <button type="button" class="btn btn-dark">mua</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>