@extends('sell.default')
@section('title','Bán sản phẩm')
<body>
   @section('navbar')
   @parent
   @endsection

   @section('description')

   <form action="javascript:void(0)" id="sell-form">
      <div class="form-row">
         <div class="form-group col-md-6 offset-md-3">
            <input type="file" id="image" name="image[]" hidden="hidden" maxlength="6" multiple />
            <button type="button" id="image-button">Upload Ảnh ở đây!!!</button>
            <span id="image-text"></span>
         </div>
      </div>

      <div class="form-row">
         <div class="form-group col-md-6 offset-md-3">
            <div class="font-weight-bold"> Tên Sản Phẩm </div>
            <input type="text" class="form-control"  name = "name" id="name">
            <small name="textname" id="textname" class="text-form text-muted">
               <h6 class="text-warning">Ex: IphoneXS, S20,...</h6>
            </small>
         </div>
      </div>

      <div class="form-row">
         <div class="form-group col-md-6 offset-md-3">
            <div class="font-weight-bold"> Loại Sản Phẩm </div>
            <input type="text" class="form-control" name="type" id="type">
            <small name="texttype" id="texttype" class="text-form text-muted">
               <h6 class="text-warning">Ex: Phone,Laptop,...</h6>
            </small>
         </div>
      </div>

      <div class="form-row">
         <div class="form-group col-md-6 offset-md-3">
            <div class="font-weight-bold"> Màu sắc </div>
            <input type="text" class="form-control" name="color" id="color">
            <small name="textcolor" id="textcolor" class="text-form text-muted">
               <h6 class="text-warning">Ex: Red,Blue,...</h6>
            </small>
         </div>
      </div>

      <div class="form-row" id="costinput">
         <div class="form-group col-md-6 offset-md-3">
            <div class="font-weight-bold"> Gía cả</div>
            <input type="text" class="form-control" name="cost" id="cost">
            <small name="textcost" id="textcost" class="text-form text-muted">
               <h6 class="text-warning">Đơn vị: VNĐ</h6>
            </small>
         </div>
      </div>

      <div class="form-row" id="quantity">
         <div class="form-group col-md-6 offset-md-3">
            <div class="font-weight-bold"> Số lượng</div>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1">
         </div>
      </div>
      
      <br>

      <div id="next">

      </div>

      <div class="container">
         <div class="row">
            <div class="col-md-2 offset-md-4">
               <a type="button" class="btn btn-dark" id="add" onclick="addField()">Thêm mô tả</a>
            </div>
            <div class="col-md-2 offset-md-1">
               <a href="javascript:void(0)" type="button" class="btn btn-danger" id="send">Đăng bán</a>
            </div>

         </div>
      </div>


   </form>

   @endsection