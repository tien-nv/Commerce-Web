<section class="admin_page">
    <div class="container">
        <div class="row" style="margin-top:0;padding:50px">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12" style="display: flex;justify-content: center">
                <div class="my-dropdown" style="width:fit-content;">
                    <label> <a href="javascript:void(0)" class="headerBar-login" style="color: #fff;">Welcome {{$adminName }}</a></label>
                    <br/>
                    <label><a class="headerBar-login" style="color: #fff;" href="{{route('logOutAdmin')}}">Đăng xuất</a></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class=" area">
                    <form action="javascript:void(0)">
                        <label for="sel1">Thêm sản phẩm</label>
                        <div class="row  show">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-product">
                                        
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="button" name="addAllProduct" id="addAllProduct" class="btn btn-success">Thêm hết</button>
                            <button type="button" name="getProduct" id="getProduct" class="btn btn-success">Cập nhật lại</button>
                            <button type="button" name="deleteAllProduct" id="deleteAllProduct" class="btn btn-danger">Xóa hết</button>
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
                        <br>
                        <button type="button" name="delAdmin" id="delAdmin" class="btn btn-success" onclick="showValue('sel4')">save</button>
                        <button type="button" class="btn btn-success" id="refresh">load Admin</button>
                        <button type="reset" class="btn btn-danger">cancel</button>
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
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>