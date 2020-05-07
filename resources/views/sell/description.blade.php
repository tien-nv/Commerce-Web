@extends('sell.default')
@section('title','Bán sản phẩm')
<body>
   @section('navbar')
   @parent
   @endsection

   @section('description')

   <form action="{{ route('sellSuccess') }}" id="sell-form" method = "post" enctype="multipart/form-data" >
      {{ csrf_field() }}
      <div class="form-row">
         <div class="form-group col-md-6 offset-md-3">
            <input type="file" id="images" name="images[]" hidden="hidden" maxlength="6" multiple />
            <button type="button" id="images-button" >Upload Ảnh ở đây!!!</button>
            <span id="images-text"></span>
         </div>
      </div>

      <div class="form-row">
         <div class="form-group col-md-6 offset-md-3">
            <div class="font-weight-bold"> Tên Sản Phẩm <span id="name"></span> </div> 
            <input type="text" class="form-control"  name = "name" minlength="3" required>
            <small name="textname" id="textname" class="text-form text-muted">
               <h6 class="text-warning">Ex: IphoneXS, S20,...</h6>
            </small>
         </div>
      </div>

      <div class="form-row">
         <div class="form-group col-md-6 offset-md-3">
            <div class="font-weight-bold"> Loại Sản Phẩm <span id="type"></span></div>
            <input type="text" class="form-control" name="type" required>
            <small name="texttype" id="texttype" class="text-form text-muted">
               <h6 class="text-warning">Ex: Phone,Laptop,...</h6>
            </small>
         </div>
      </div>

      <div class="form-row">
         <div class="form-group col-md-6 offset-md-3">
            <div class="font-weight-bold"> Màu sắc <span id="color"></span> </div>
            <input type="text" class="form-control" name="color" required>
            <small name="textcolor" id="textcolor" class="text-form text-muted">
               <h6 class="text-warning">Ex: Red,Blue,...</h6>
            </small>
         </div>
      </div>

      <div class="form-row" id="costinput">
         <div class="form-group col-md-6 offset-md-3">
            <div class="font-weight-bold"> Gía cả <span id="cost"></span></div>
            <input type="number" class="form-control" name="cost" min="50000" max="10000000000" required>
            <small name="textcost" id="textcost" class="text-form text-muted">
               <h6 class="text-warning">Đơn vị: VNĐ(50000 <= X <=10000000000)</h6>
            </small>
         </div>
      </div>

      <div class="form-row" id="quantityinput">
         <div class="form-group col-md-6 offset-md-3">
            <div class="font-weight-bold"> Số lượng <span id="quantity"></span> </div>
            <input type="number" class="form-control" name="quantity" min="1" max = "100" required>
            <small name="textcost" id="textcost" class="text-form text-muted">
               <h6 class="text-warning">Note: 1<= x <=100</h6>
            </small>
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
               <button type="submit" class="btn btn-danger" id="send" onclick="">Đăng bán</a>
            </div>

         </div>
      </div>


   </form>

   @endsection