<section class="admin_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="my-dropdown">
                    <label> <a href="javascript:void(0)" class="headerBar-login" style="margin-right: 40px;color: green;">Welcome {{$adminName }}</a></label>
                    <div id="my-dropdown-content">
                        <a href="#">Profile</a>
                        <a href="{{route('logOutAdmin')}}">Check out</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class=" area">
                    <form action="javascript:void(0)">
                        <label for="sel1">Thêm sản phẩm</label>
                        <div class="row  show">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 show-img">
                                <img src="img\\product2.jpg" alt="ảnh sản phẩm">
                            </div>  
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xl-8">
                                <select class="form-control" id="sel1" name="sel1" multiple size="3">
                                    <option value="thêm">sản phẩm một</option>
                                    <option value="thêm">sản phẩm một</option>
                                    <option value="thêm">sản phẩm một</option>
                                    <option value="thêm">sản phẩm một</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="button" name="addProduct" id="addProduct" class="btn btn-primary" onclick="showValue('sel1')">save</button>
                            <button type="reset" class="btn btn-primary">cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="area">
                    <form action="javascript:void(0)">
                        <label for="sel2">Xóa sản phẩm</label>
                        <div class="row  show">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 show-img">
                                <img src="img\\product1.jpg" alt="ảnh sản phẩm">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xl-8 ">
                                <select class="form-control" id="sel2" name="sel2" multiple size="3">
                                    <option value="Xóa">sản phẩm một</option>
                                    <option value="xóa">sản phẩm một</option>
                                    <option value="xóa">sản phẩm một</option>
                                    <option value="xóa">sản phẩm một</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" name="delProduct" id="delProduct" class="btn btn-primary" onclick="showValue('sel2')">save</button>
                        <button type="reset" class="btn btn-primary">cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class=" area">
                    <form action="javascript:void(0)">
                        <!-- {{ csrf_field() }} -->
                        <label for="sel3">Sửa sản phẩm</label>
                        <div class="row show">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 show-img">
                                <img src="img\\product2.jpg" alt="ảnh sản phẩm">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xl-8">
                                <select class="form-control" id="sel3" name="sel3" multiple size="3">
                                    <option value="Sửa">sản phẩm một</option>
                                    <option value="sửa">sản phẩm một</option>
                                    <option value="sửa">sản phẩm một</option>
                                    <option value="sửa">sản phẩm một</option>
                                </select>
                                <p>chỗ này sẽ thêm những ô để có thể thay đổi sản phẩm</p>
                            </div>
                        </div>
                        <button type="button" name="changeProduct" id="changeProduct" class="btn btn-primary" onclick="showValue('sel3')">save</button>
                        <button type="reset" class="btn btn-primary">cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="area">
                    <form action="javascript:void(0)">
                        <!-- {{ csrf_field() }} -->
                        <label for="sel4">Xóa admin</label>
                        <select class="form-control" id="sel4" name="sel4">
                            <option value="" aria-checked="true">Cảnh báo xóa 1 admin</option>
                            <option value="Xóa admin">admin một</option>
                            <option value="Xóa admin">admin hai</option>
                            <option value="Xóa admin">admin hai</option>
                            <option value="Xóa admin">admin hai</option>
                        </select>
                        <button type="button" name="delAdmin" id="delAdmin" class="btn btn-danger" onclick="showValue('sel4')">save</button>
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
                            <button type="submit" id="submitRegister" class="btn btn-primary setColor">Đăng kí admin</button>
                            <button type="reset" class="btn btn-primary setColor">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>