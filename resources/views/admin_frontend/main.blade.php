<section class="admin_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class=" area">
                    {{ csrf_field() }}
                    <label for="sel1">Thêm sản phẩm</label>
                    <select class="form-control" id="sel1" name="sel1">
                        <option value="">sản phẩm một</option>
                        <option value="">sản phẩm một</option>
                        <option value="">sản phẩm một</option>
                        <option value="">sản phẩm một</option>
                    </select>
                    <button type="button" name="addProduct" id="addProduct" class="btn btn-primary" onclick="">save</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="area">
                    {{ csrf_field() }}
                    <label for="sel2">Xóa sản phẩm</label>
                    <select class="form-control" id="sel2" name="sel2">
                        <option value="">sản phẩm một</option>
                        <option value="">sản phẩm một</option>
                        <option value="">sản phẩm một</option>
                        <option value="">sản phẩm một</option>
                    </select>
                    <button type="button" name="delProduct" id="delProduct" class="btn btn-primary" onclick="">save</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class=" area">
                    {{ csrf_field() }}
                    <label for="sel3">Sửa sản phẩm</label>
                    <select class="form-control" id="sel3" name="sel3">
                        <option value="">sản phẩm một</option>
                        <option value="">sản phẩm một</option>
                        <option value="">sản phẩm một</option>
                        <option value="">sản phẩm một</option>
                    </select>
                    <button type="button" name="changeProduct" id="changeProduct" class="btn btn-primary" onclick="">save</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="area">
                    {{ csrf_field() }}
                    <label for="sel4">Xóa admin</label>
                    <select class="form-control" id="sel12" name="sel4">
                        <option value="">admin một</option>
                        <option value="">admin hai</option>
                        <option value="">admin hai</option>
                        <option value="">admin hai</option>
                    </select>
                    <button type="button" name="delAdmin" id="delAdmin" class="btn btn-primary" onclick="">save</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="area">
                    <form action="{{ url('adminRegister') }}" onsubmit="return validateAdminRegister()" method="post" name="registerAdminForm" id="registerAdminForm">
                        {{ csrf_field() }}
                        <label>Thêm admin</label>
                        <div>
                            <span class="my-alert-input" id="adminRegister"></span>
                            <input type="text" name="adminRegister" class="form-control" placeholder="Admin Name">
                        </div>
                        <div>
                            <span class="my-alert-input" id="passwordRegister"></span>
                            <input type="password" name="passwordRegister" class="form-control" placeholder="Mật khẩu">
                        </div>
                        <div>
                            <span class="my-alert-input" id="passwordRegister"></span>
                            <input type="password" name="checkPasswordRegister" class="form-control" placeholder="Nhập lại mật khẩu">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary setColor">Đăng kí admin</button>
                            <button type="reset" class="btn btn-primary setColor">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>