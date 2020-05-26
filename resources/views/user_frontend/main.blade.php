<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
    <div class="container">
        <div class="row">
            <!-- MAIN-SLIDER-AREA START -->
            <div class="main-slider-area">
                <!-- SLIDER-AREA START -->
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="slider-area">
                        <div id="wrapper">
                            <div class="slider-wrapper">
                                <div id="mainSlider" class="nivoSlider">
                                    <img src="img/slider/2.jpg" alt="main slider" title="#htmlcaption" />
                                    <img src="img/slider/1.jpg" alt="main slider" title="#htmlcaption2" />
                                </div>
                                <div id="htmlcaption" class="nivo-html-caption slider-caption">
                                    <div class="slider-progress"></div>
                                    <div class="slider-cap-text slider-text1">
                                        <div class="d-table-cell">
                                            <h2 class="animated bounceInDown">Tuyển nhân viên</h2>
                                            <p class="animated bounceInUp">Công ty trách nhiệm hữu hạn 1 thành viên: trang giao dịch thương mại điện tử chuyên bán hàng giả hàng kém chất lượng tuyển thành viên làm việc parttime hoặc full time.</p>
                                            <a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Đăng kí ngay <i class="fa fa-caret-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                                    <div class="slider-progress"></div>
                                    <div class="slider-cap-text slider-text2">
                                        <div class="d-table-cell">
                                            <h2 class="animated bounceInDown">Những sản phẩm second hand mới cập nhật</h2>
                                            <p class="animated bounceInUp">Sàn giao dịch thương mại điện tử thông báo các sản phẩm đã qua sử dụng hết hạn ... đang được đăng bán mới nhất hãy mua ngay nào</p>
                                            <a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Shop now <i class="fa fa-caret-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SLIDER-AREA END -->
                <!-- SLIDER-RIGHT START -->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="slider-right zoom-img m-top">
                        <a href="#"><img class="img-responsive" src="img/product/cms11.jpg" alt="sidebar left" /></a>
                    </div>
                </div>
                <!-- SLIDER-RIGHT END -->
            </div>
            <!-- MAIN-SLIDER-AREA END -->
        </div>
        <!-- Hiển thị thông tin chi tiết của 1 sản phẩm -->
        <div class="product-description" id="product-description">
            <div class="formProductPopup">
                <i class="fa fa-times" onclick="offProductDesc()"></i>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- BSTORE-BREADCRUMB START -->
                            <div class="bstore-breadcrumb">
                                <span> <i class="fa fa-caret-right"> </i> </span>
                                <span> Xem chi tiết sản phẩm </span>
                            </div>
                            <!-- BSTORE-BREADCRUMB END -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="single-product-view">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active">
                                        <div class="single-product-image">
                                            <img id="big-img" src="" alt="single-product-image" />
                                            <a id="view-larger" class="fancybox" href="" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="show-img">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <div class="single-product-descirption">
                                <h2 id="de-name-product"></h2>
                                <div class="single-product-social-share">
                                    <ul>
                                        <li><a href="#" class="twi-link"><i class="fa fa-twitter"></i>Tweet</a></li>
                                        <li><a href="#" class="fb-link"><i class="fa fa-facebook"></i>Share</a></li>
                                        <li><a href="#" class="g-plus-link"><i class="fa fa-google-plus"></i>Google+</a></li>
                                        <li><a href="#" class="pin-link"><i class="fa fa-pinterest"></i>Pinterest</a></li>
                                    </ul>
                                </div>
                                <div class="single-product-review-box">
                                    <div class="rating-box">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-empty"></i>
                                    </div>
                                    <div class="read-reviews">
                                        <a href="#">Read reviews (1)</a>
                                    </div>
                                    <div class="write-review">
                                        <a href="#">Write a review</a>
                                    </div>
                                </div>
                                <div class="single-product-condition">
                                    <p>Reference: <span></span></p>
                                    <p>Condition: <span></span></p>
                                </div>
                                <div class="single-product-price">
                                    <h2 id="de-cost-product"></h2>
                                </div>
                                <div class="single-product-desc">
                                    <p id="de-desc-product"></p>
                                    <div class="product-in-stock">
                                        <p id="sold-product"></p>
                                    </div>
                                    <div class="product-in-stock">
                                        <p id="de-avai-product"></p>
                                    </div>
                                </div>
                                <!-- <div class="single-product-info">
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                    <a href="#"><i class="fa fa-print"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                </div> -->
                                <div class="single-product-quantity">
                                    <p class="small-title">Số lượng</p>
                                    <div class="cart-quantity">
                                        <div class="cart-plus-minus-button single-qty-btn">
                                            <input class="cart-plus-minus sing-pro-qty" type="text" name="getTotal" id="getTotal" value="0">
                                            
                                        </div>
                                        <strong id="order-total"></strong>
                                    </div>
                                </div>
                                <div class="single-product-size">
                                    <p class="small-title">Màu sắc </p>
                                    <select name="product-color" id="product-color" style="border: 1px solid #ccc">
                                    </select>
                                </div>
                                <div class="single-product-add-cart" style="margin-top: 30px">
                                    <a class="add-cart-text" title="Add to cart" id="add-to-cart">Mua ngay!!!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TOW-COLUMN-PRODUCT START -->
        <div class="featured-products-area">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 mobile-catelog" style="position: sticky;top:54px;">
                    <!-- PRODUCT-LEFT-SIDEBAR START -->
                    <div class="product-left-sidebar">
                        <h2 class="left-title pro-g-page-title">Lọc sản phẩm</h2>
                        <!-- SINGLE SIDEBAR CONDITION START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Sắp xếp theo</span>
                            <ul>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="condition" />
                                        <span></span>
                                    </label>
                                    <a href="javascript:void(0)" id="sortNewest">Mới nhất</a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="condition" />
                                        <span></span>
                                    </label>
                                    <a href="javascript:void(0)" id="sortCheapest">Rẻ nhất</a>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR CONDITION END -->
                        <!-- SINGLE SIDEBAR PRICE START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Giá</span>
                            <ul>
                                <li>
                                    <label><strong>Range:</strong><input type="text" id="slidevalue" /></label>
                                </li>
                                <li>
                                    <div id="price-range"></div>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR PRICE END -->
                        <!-- SINGLE SIDEBAR COLOR START -->
                        <!-- <div class="product-single-sidebar">
                            <span class="sidebar-title">Color</span>
                            <ul class="product-color-var">
                                <li>
                                    <i class="fa fa-square color-beige"></i>
                                    <a href="#">Beige<span> (1)</span></a>
                                </li>
                                <li>
                                    <i class="fa fa-square color-white"></i>
                                    <a href="#">white<span> (2)</span></a>
                                </li>
                                <li>
                                    <i class="fa fa-square color-black"></i>
                                    <a href="#">black<span> (2)</span></a>
                                </li>
                                <li>
                                    <i class="fa fa-square color-orange"></i>
                                    <a href="#">orange<span> (5)</span></a>
                                </li>
                                <li>
                                    <i class="fa fa-square color-blue"></i>
                                    <a href="#">blue<span> (8)</span></a>
                                </li>
                                <li>
                                    <i class="fa fa-square color-green"></i>
                                    <a href="#">green<span> (3)</span></a>
                                </li>
                                <li>
                                    <i class="fa fa-square color-yellow"></i>
                                    <a href="#">yellow<span> (4)</span></a>
                                </li>
                                <li>
                                    <i class="fa fa-square color-pink"></i>
                                    <a href="#">pink<span> (6)</span></a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- SINGLE SIDEBAR COLOR END -->
                    </div>
                    <!-- PRODUCT-LEFT-SIDEBAR END -->
                    <!-- SINGLE SIDEBAR TAG START -->
                    <div class="product-left-sidebar">
                        <h2 class="left-title">Tags </h2>
                        <div class="category-tag">
                            <a href="#">fashion</a>
                            <a href="#">handbags</a>
                            <a href="#">women</a>
                            <a href="#">men</a>
                            <a href="#">kids</a>
                            <a href="#">New</a>
                            <a href="#">Accessories</a>
                            <a href="#">clothing</a>
                            <a href="#">New</a>
                        </div>
                    </div>
                    <!-- SINGLE SIDEBAR TAG END -->
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="center-title-area">
                        <h2 class="center-title">Các mặt hàng</h2>
                    </div>
                        <div class="my-products" id="row-products">

                            @for($i = 0;$i < count($products);$i++) 
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 one-product">
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="javascript:void(0)">
                                                <img src="{{ $products[$i]['Img'] }}" alt="product-image" />
                                            </a>
                                            <a href="#" class="new-mark-box" title="Người bán">{{ $products[$i]['Seller'] }}</a>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="javascript:void(0)" onclick="onProductDesc({{ $products[$i]['Product_ID'] }})" id="link-img-product" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>1 Review (s)</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0)" onclick="onProductDesc({{ $products[$i]['Product_ID'] }})">{{ $products[$i]['Product_Name'] }}</a>
                                            <div class="price-box">
                                                <span class="price">{{ $products[$i]['Cost'] }} <span class="price">vnđ</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                        </div>
                        @endfor

                    </div>
                </div>
            </div>
            <div class="owl-next" style="display:flex;justify-content: center;margin-top:40px" id="seeMore">
                <i class=" owl-next-icon" style="width:100px;height: 25px;font-size: 18px">Xem thêm</i>
            </div>
        </div>        
    </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->