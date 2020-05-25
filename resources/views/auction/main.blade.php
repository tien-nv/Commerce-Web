<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
    <div class="container">
        <!-- Hiển thị thông tin chi tiết của 1 sản phẩm -->
        <div class="product-description" id="product-auction">
            <div class="formProductPopup">
                <i class="fa fa-times" onclick="offProductAuction()"></i>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- BSTORE-BREADCRUMB START -->
                            <div class="bstore-breadcrumb">
                                <span> <i class="fa fa-caret-right"> </i> </span>
                                <span class="show-infor" id=""> Xem chi tiết sản phẩm </span>
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
                                <div class="single-product-price">
                                    <h3 style="text-decoration: none;" check="" id="de-time-left">Time left: <span id="de-time-left-h" style="font-size: 25px; "></span>:<span id="de-time-left-m" style="font-size: 25px;"></span>:<span id="de-time-left-s" style="font-size: 25px;"></span></h3>
                                </div>
                                <div class="single-product-price">
                                    <h2 id="de-cost-product"></h2>
                                </div>
                                <div class="single-product-desc">
                                    <p id="de-desc-product"></p>
                                </div>
                                <!-- <div class="single-product-info">
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                    <a href="#"><i class="fa fa-print"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                </div> -->
                                <small name="textcost" class="text-form text-bold">
                                    <h4 class="text-danger" id="warning"></h4>
                                </small>
                                <div class="single-product-quantity">
                                    <p class="small-title">Điền giá tiền</p>
                                    <div class="cart-quantity">
                                        <div class="cart-plus-minus-button single-qty-btn">
                                            {{ csrf_field() }}
                                            <input class="form-control" type="number" id="auction-cost" placeholder="10 tỷ" min="1" max="10000000000000"></input>

                                            <small name="textcost" id="textcost" class="text-form text-bold">
                                                <h4 class="text-dark">Đơn vị: VNĐ</h4>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-product-size">
                                    <p class="small-title">Màu sắc </p>
                                    <select name="product-color" id="product-color" style="border: 1px solid #ccc">
                                    </select>
                                </div>
                                <div class="single-product-add-cart" style="margin-top: 30px">
                                    <a class="add-cart-text" title="Add to cart" id="push-cost">
                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                        Rao giá</a>
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
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 mobile-catelog">
                    <!-- PRODUCT-LEFT-SIDEBAR START -->
                    <div class="product-left-sidebar">
                        <h2 class="left-title pro-g-page-title">Catalog</h2>
                        <!-- SINGLE SIDEBAR ENABLED FILTERS START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">ENABLED FILTERS:</span>
                            <ul class="filtering-menu">
                                <li>
                                    Categories: Dresses
                                    <a href="#"><i class="fa fa-remove"></i></a>
                                </li>
                                <li>
                                    Avaiale: In stock
                                    <a href="#"><i class="fa fa-remove"></i></a>
                                </li>
                                <li>
                                    Categories: Dresses
                                    <a href="#"><i class="fa fa-remove"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR ENABLED FILTERS END -->
                        <!-- SINGLE SIDEBAR CATEGORIES START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Categories</span>
                            <ul>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="categories" />
                                        <span></span>
                                    </label>
                                    <a href="#">Tops<span> (12)</span></a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="categories" />
                                        <span></span>
                                    </label>
                                    <a href="#">Dresses<span> (13)</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR CATEGORIES END -->
                        <!-- SINGLE SIDEBAR AVAILABILITY START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Availability</span>
                            <ul>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="availability" />
                                        <span></span>
                                    </label>
                                    <a href="#">In stock<span> (13)</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR AVAILABILITY END -->
                        <!-- SINGLE SIDEBAR CONDITION START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Condition</span>
                            <ul>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="condition" />
                                        <span></span>
                                    </label>
                                    <a href="#">new<span> (13)</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR CONDITION END -->
                        <!-- SINGLE SIDEBAR MANUFACTURER START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Manufacturer</span>
                            <ul>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="manufacturer" />
                                        <span></span>
                                    </label>
                                    <a href="#">Fashion Manufacturer<span> (13)</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR MANUFACTURER END -->
                        <!-- SINGLE SIDEBAR PRICE START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Price</span>
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
                        <!-- SINGLE SIDEBAR SIZE START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Size</span>
                            <ul>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="Size" />
                                        <span></span>
                                    </label>
                                    <a href="#">S<span> (10)</span></a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="Size" />
                                        <span></span>
                                    </label>
                                    <a href="#">m<span> (10)</span></a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="Size" />
                                        <span></span>
                                    </label>
                                    <a href="#">l<span> (10)</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR SIZE END -->
                        <!-- SINGLE SIDEBAR COLOR START -->
                        <div class="product-single-sidebar">
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
                        </div>
                        <!-- SINGLE SIDEBAR COLOR END -->
                        <!-- SINGLE SIDEBAR COMPOSITIONS START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Compositions</span>
                            <ul>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="compositions" />
                                        <span></span>
                                    </label>
                                    <a href="#">Cotton<span>(8)</span></a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="compositions" />
                                        <span></span>
                                    </label>
                                    <a href="#"> Polyester<span>(3)</span></a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="compositions" />
                                        <span></span>
                                    </label>
                                    <a href="#"> Viscose<span>(2)</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR COMPOSITIONS END -->
                        <!-- SINGLE SIDEBAR STYLES START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Styles</span>
                            <ul>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="styles" />
                                        <span></span>
                                    </label>
                                    <a href="#">Casual<span>(5)</span></a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="styles" />
                                        <span></span>
                                    </label>
                                    <a href="#">Dressy<span>(1)</span></a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="styles" />
                                        <span></span>
                                    </label>
                                    <a href="#">Girly<span>(7)</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR STYLES END -->
                        <!-- SINGLE SIDEBAR PROPERTIES START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Properties</span>
                            <ul>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="properties" />
                                        <span></span>
                                    </label>
                                    <a href="#">Colorful Dress<span>(4)</span></a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="properties" />
                                        <span></span>
                                    </label>
                                    <a href="#">Maxi Dress <span>(1)</span></a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="properties" />
                                        <span></span>
                                    </label>
                                    <a href="#">Midi Dress<span>(2)</span></a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="properties" />
                                        <span></span>
                                    </label>
                                    <a href="#">Short Dress<span>(2)</span></a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="properties" />
                                        <span></span>
                                    </label>
                                    <a href="#"> Short Sleeve<span>(4)</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR PROPERTIES END -->
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
                        <h2 class="center-title">Các mặt hàng đấu giá</h2>
                    </div>
                    <div class="product-shooting-area">
                        <div class="product-shooting-bar">
                            <div class="show-page" style="display:flex">
                                <label for="perPage">Sắp xếp theo: </label>
                                <ul style="display: inline-flex; margin-left:10px;">
                                    <li style="margin-left: 30px"><a href="javascript:void(0)" id="sortNewest">Mới nhất</a></li>
                                    <li style="margin-left: 30px"><a href="javascript:void(0)" id="sortCheapest">Rẻ nhất</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="my-products" id="row-products">
                        @for($i = 0;$i < count($products);$i++) <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 one-product">
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
                                                <li><a href="javascript:void(0)" onclick="onProductAuction({{ $products[$i]['Product_ID'] }})" id="link-img-product" title="Quick view"><i class="fa fa-search"></i></a></li>
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
                                        <a href="single-product.html">{{ $products[$i]['Product_Name'] }}</a>
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

    </div>
    <div class="owl-next" style="display:flex;justify-content: center;margin-top:40px" id="seeMore">
        <i class=" owl-next-icon" style="width:100px;height: 25px;font-size: 18px">Xem thêm</i>
    </div>
    <!-- TOW-COLUMN-PRODUCT END -->
    </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->