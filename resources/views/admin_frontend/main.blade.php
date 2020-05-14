

<section class="admin_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="my-dropdown" style="width:fit-content;margin-left:30%;">
                    <label> <a href="javascript:void(0)" class="headerBar-login" style="margin-right: 40px;color: #FF4F4F;">Welcome {{$adminName }}</a></label>
                    <div id="my-dropdown-content">
                        <a href="#">Profile</a>
                        <a href="{{route('logOutAdmin')}}">Check out</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class=" area">
                    <form action="javascript:void(0)">
                        <label for="sel1">Thêm sản phẩm</label>
                        <div class="row  show">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xl-5">
                                <div class=" show-img">
                                    <img src="img\\product2.jpg" alt="ảnh sản phẩm">
                                    <img src="img\\product2.jpg" alt="ảnh sản phẩm">
                                    <img src="img\\product2.jpg" alt="ảnh sản phẩm">
                                    <img src="img\\product2.jpg" alt="ảnh sản phẩm">
                                    <img src="img\\product2.jpg" alt="ảnh sản phẩm">
                                    <img src="img\\product2.jpg" alt="ảnh sản phẩm">
                                    <img src="img\\product2.jpg" alt="ảnh sản phẩm">
                                    <img src="img\\product2.jpg" alt="ảnh sản phẩm">
                                    <img src="img\\product2.jpg" alt="ảnh sản phẩm">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xl-7">
                                <select class="form-control" id="sel1" name="sel1" multiple size="3">
                                    <option value="thêm">sản phẩm một</option>
                                    <option value="thêm">sản phẩm một</option>
                                    <option value="thêm">sản phẩm một</option>
                                    <option value="thêm">sản phẩm một</option>
                                </select>
                                <div class="show-infor">
                                    <div class="name-product">Tên sản phẩm</div>
                                    <div class="cost">2.000.000</div>
                                    <div class="color">
                                        <label for="product-color">Màu sắc: </label>
                                        <span id="colors"> đỏ, xanh</span>
                                    </div>
                                    <div class="total">Số lượng: 1</div>
                                    <div class="other">
                                        <p>Một số mô tả khác mô tả 1</p>
                                        <p>Một số mô tả khác mô tả 2</p>
                                        <p>Một số mô tả khác mô tả 2</p>
                                        <p>Một số mô tả khác mô tả 2</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" name="addProduct" id="addProduct" class="btn btn-primary" onclick="showValue('sel1')">save</button>
                            <button type="reset" class="btn btn-primary">cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class=" area">
                    <form action="javascript:void(0)">
                        <label for="sel1">Thêm sản phẩm</label>
                        <div class="row  show">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr class="text-warning">
                                            <th> Tên Sản phâm</th>
                                            <th> Loại Sản phẩm </th>
                                            <th> Màu sắc </th>
                                            <th> Giá cả </th>
                                            <th class="text-center"> Số lượng </th>
                                            <th class="text-center"> isAuction </th>
                                            <th class="text-center"> Time </th>
                                            <th> </th>
                                            <th> </th>
                                        </tr>
                                        <tr class="text-white font-weight-bold">
                                            <td> Sản phẩm 1 </td>
                                            <td> Kiểu 1 </td>
                                            <td> Màu 1 </td>
                                            <td> Giá 1 </td>
                                            <td class="text-center"> Số lượng </td>
                                            <td class="text-center"> 1  </td>
                                            <td class="text-center"> 12 </td>
                                            <td class="text-right"><button class="btn btn-sm btn-warning"><i class="fa fa-plus">Add </i> </button></td>
                                            <td class="text-left"><button class="btn btn-sm btn-danger"><i class="fa fa-trash">Remove</i> </button></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                            
                        <div>
                            <button type="button" name="addProduct" id="addProduct" class="btn btn-success" onclick="showValue('sel1')">save</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        

        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="area">
                    <form action="javascript:void(0)">
                        {{ csrf_field() }}
                        <label for="sel4">Xóa admin</label>
                        <select class="form-control" id="sel4" name="sel4">
                            <option value="" aria-checked="true">Xóa 1 admin</option>
                        </select>
                        <div class="progress" id="progress" style="display:none;padding-bottom:25px;">
                            <div class="progress-bar"></div>
                        </div>
                        
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action list-group-item-danger">Admin1</a>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-warning">Admin2</a>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-info">Admin3</a>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-danger">Admin4</a>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-warning">Admin5</a>
                            <a href="#" class="list-group-item list-group-item-action list-group-item-info">Admin6</a>
                        </div>
                        <br>
                        <button type="button" name="delAdmin" id="delAdmin" class="btn btn-success" onclick="showValue('sel4')">save</button>
                        {{-- <button type="button" class="btn btn-danger" id="refresh">load Admin</button>
                        <button type="reset" class="btn btn-danger">cancel</button> --}}
                    
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="area">
                    <form action="javascript:void(0)" onsubmit="return validateAdminRegister()" method="post" name="registerAdminForm" id="registerAdminForm">
                        {{ csrf_field() }}
                        <label>Thêm admin</label>
                        <div>
                            <span class="my-alert-input" id="adminRegister"></span>
                            <input type="text" id="inputAdminName" name="adminRegister" class="form-control" placeholder="Admin Name" onkeyup="checkConflic()">
                        </div>
                        <div>
                            <span class="my-alert-input" id="passwordRegister"></span>
                            <input type="password" id="inputPasswordRegister" name="passwordRegister" class="form-control" placeholder="Mật khẩu">
                        </div>
                        <div>
                            <span class="my-alert-input" id="checkPasswordRegister"></span>
                            <input type="password" name="checkPasswordRegister" class="form-control" placeholder="Nhập lại mật khẩu">
                        </div>
                        <div>
                            <button type="submit" id="submitRegister" class="btn btn-success setColor">Đăng kí admin</button>
                            <button type="reset" class="btn btn-primary setColor">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>