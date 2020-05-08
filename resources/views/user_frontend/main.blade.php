<section class="main-component">
    <div class="filter">
        <span>Sắp xếp theo</span>
        <a href="#">Mới nhất</a>
        <a href="#">Rẻ nhất</a>
        <a href="#">Đấu giá</a>
    </div>
    <div class="container" style="max-width: 98%">

        <!-- chỗ này bị bug dùng js để show nếu mà màn hình nhỏ thì show 2 sản phẩm 1 dòng
    còn nếu màn hình lớn thì show 5 sản phẩm 1 dòng, màn hình trung bình thì show 3 sản phẩm-->

        <!-- một vòng for để show hàng của các sản phẩm -->
        <div id="row-products" class="products">
            <!-- một vòng for để show sản phẩm một row là -->
            @for($i = 0;$i < count($products);$i++)
             <div class="thread_list">
                <a href="javascript:void(0)" onclick="onProductDesc({{ $products[$i]['Product_ID'] }})" id="link-img-product">
                    <div id="single-product" class="one-product ">
                        <div>

                            <img src="{{ $products[$i]['Img'] }}" alt="sản phẩm" title="ấn vào để xem chi tiết">

                        </div>
                        <div class="product-content">
                            <div class="content">
                                <p class="user">{{ $products[$i]['Seller'] }}</p>
                                <p class="name-product">{{ $products[$i]['Product_Name'] }}</p>
                            </div>
                            <p class="cost">{{ $products[$i]['Cost'] }}<span> vnđ</span></p>
                            <p><i class="fa fa-map-marker"></i>Hà nội</p>
                        </div>
                    </div>
                </a>
        </div>
        @endfor
        <!-- vị trí này để chèn thêm các sản phẩm sau khi click xem thêm -->
    </div>
    </div>
    <div class="other">
        <button type="button" class="btn btn-outline-light" id="seeMore" onclick="">XEM THÊM</button>
    </div>
    <div class="product-description" id="product-description">
        <div class="formProductPopup">
            <i class="fa fa-times" onclick="offProductDesc()"></i>
            <div class="show-img">
                <!-- truyền biến -->
                <img id="big-img" src="" alt="Sản phẩm" title="Sản phẩm :)" class="fade">
                <div class="more-img">
                    <i class="fa fa-caret-left" id="caret-left" onclick="prevImg()"></i>
                    <!-- chỗ này truyền các biến tương ứng với từng ảnh -->
                    <div id="list-img">

                    </div>
                    <div style="text-align:center;margin: 7% 0;" id="list-dot">
                        <!-- truyền biến truyền vào thứ tự các ảnh 0 1 2 3 4-->

                    </div>
                    <i class="fa fa-caret-right" id="caret-right" onclick="nextImg()"></i>
                </div>
            </div>
            <div class="show-infor">
                <form action="javascript:void(0)">
                    {{ csrf_field() }}
                    <div class="name-product" id="de-name-product">Tên sản phẩm</div>
                    <div class="cost" id="de-cost-product">2.000.000</div>
                    <div class="color">
                        <label for="product-color">Màu sắc: </label>
                        <select name="product-color" id="product-color" class="form-control">
                            <option value="red">red</option>
                            <option value="blue">blue</option>
                        </select>
                    </div>
                    <div class="total">Tổng số lượng: <span id="total-product"></span></div>
                    <div class="total">Đã bán: <span id="sold-product"></span></div>
                    <div class="total">Mua số lượng:<span id="order-total"></span> <input type="number" class="form-control" name="getTotal" id="getTotal" min="1"></div>
                    <div class="other">
                        <p id="desc1">Một số mô tả khác mô tả 1</p>
                        <p id="desc2">Một số mô tả khác mô tả 2</p>
                        <p id="desc3"></p>
                        <p id="desc4"></p>
                    </div>
                    <div class="buy">
                        <button type="button" class="btn btn-dark" id="add-to-cart">
                            <i class="fa fa-shopping-cart cart-icon"></i>
                            buy now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>