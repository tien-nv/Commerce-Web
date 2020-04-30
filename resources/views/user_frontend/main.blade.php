<section class="main-component">
    <div class="filter"></div>
    <!-- chỗ này bị bug dùng js để show nếu mà màn hình nhỏ thì show 2 sản phẩm 1 dòng
    còn nếu màn hình lớn thì show 5 sản phẩm 1 dòng, màn hình trung bình thì show 3 sản phẩm-->
    <div class="container">
        <!-- một vòng for để show hàng của các sản phẩm -->
        <div id="row-products" class="products">
            <!-- một vòng for để show sản phẩm một row là -->
            @for($i = 0;$i < 15;$i++)
            <div class="thread_list">
                <div id="single-product" class="one-product ">
                    <div>
                        <a href="javascript:void(0)" onclick="onProductDesc()">
                            <img src="img\\product2.jpg" alt="sản phẩm" title="ấn vào để xem chi tiết">
                        </a>
                    </div>
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
        @endfor
    <!-- vị trí này để chèn thêm các sản phẩm sau khi click xem thêm -->
        </div>
    <div class="other">
        <button type="button" class="btn btn-dark" id="seeMore" onclick="">XEM THÊM</button>
    </div>
    <div class="product-description" id="product-description">
        <div class="formProductPopup">
            <i class="fa fa-times" onclick="offProductDesc()"></i>
            <div class="show-img">
                <!-- truyền biến -->
                <img id="big-img" src="img/product1.jpg" alt="Sản phẩm" title="Sản phẩm :)" class="fade">
                <div class="more-img" id="list-img">
                    <i class="fa fa-caret-left" id="caret-left" onclick="prevImg()"></i>
                    <!-- chỗ này truyền các biến tương ứng với từng ảnh -->

                    <img id="small-img" src="img/product1.jpg" alt="Sản phẩm" title="Sản phẩm :)">
                    <img id="small-img" src="img/product2.jpg" alt="Sản phẩm" title="Sản phẩm :)">
                    <img id="small-img" src="img/product3.jpg" alt="Sản phẩm" title="Sản phẩm :)">
                    <img id="small-img" src="img/product4.jpg" alt="Sản phẩm" title="Sản phẩm :)">
                    <div style="text-align:center;margin: 7% 0;">
                        <!-- truyền biến truyền vào thứ tự các ảnh 0 1 2 3 4-->
                        <span class="dot active" onclick="showClickSlide(0)"></span>
                        <span class="dot" onclick="showClickSlide(1)"></span>
                        <span class="dot" onclick="showClickSlide(2)"></span>
                        <span class="dot" onclick="showClickSlide(3)"></span>
                    </div>
                    <i class="fa fa-caret-right" id="caret-right" onclick="nextImg()"></i>
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
                <div class="total">Số lượng còn lại: 1</div>
                <div class="total">Đã bán: 1</div>
                <div class="other">
                    <p>Một số mô tả khác mô tả 1</p>
                    <p>Một số mô tả khác mô tả 2</p>
                </div>
                <div class="buy">
                    <button type="button" class="btn btn-dark">
                        <i class="fa fa-shopping-cart cart-icon"></i>
                        buy now
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>