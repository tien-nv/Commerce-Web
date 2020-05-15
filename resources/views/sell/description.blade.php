@extends('sell.default')
@section('title','Bán sản phẩm')

@section('navbar')
@parent
@endsection

@if(isset($result))
@if($result == 1)
<script>
   setTimeout(function(){alert('Bạn đã đăng bán thành công hãy đợi admin phê duyệt :D')},1000);
</script>
@endif
@if($result == 0)
<script>
   setTimeout(function(){alert('Không thể thêm sản phẩm của bạn. Vui lòng xem lại ảnh và thử lại')},1000);
</script>
@endif
@endif

@section('description')

<form action="{{ route('sellSuccess') }}" id="sell-form" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
   <div class="form-row">
      <div class="form-group col-md-6 offset-md-3">
         <input type="file" id="images" name="images[]" hidden="hidden" maxlength="6" multiple />
         <button type="button" id="images-button">Upload Ảnh ở đây!!!</button>
         <span id="images-text"></span>
      </div>
   </div>

   <div class="form-row">
      <div class="form-group col-md-6 offset-md-3">
         <div class="font-weight-bold"> Tên Sản Phẩm <span id="name"></span> </div>
         <input type="text" class="form-control" id="input-name" name="name" minlength="3" required>
         <small name="textname" id="textname" class="text-form text-muted">
            <h6 class="text-warning">Ex: IphoneXS, S20,...</h6>
         </small>
      </div>
   </div>

   <div class="form-row">
      <div class="form-group col-md-6 offset-md-3">
         <div class="font-weight-bold"> Loại Sản Phẩm <span id="type"></span></div>
         <input type="text" class="form-control" id="input-type" name="type" required>
         <small name="texttype" id="texttype" class="text-form text-muted">
            <h6 class="text-warning">Các loại hợp lệ: phone, laptop, camera, tv, fridge, keyboard, book, watch</h6>
         </small>
      </div>
   </div>

   <div class="form-row">
      <div class="form-group col-md-6 offset-md-3">
         <div class="font-weight-bold"> Màu sắc <span id="color"></span> </div>
         <input type="text" class="form-control" id="input-color" name="color" required>
         <small name="textcolor" id="textcolor" class="text-form text-muted">
            <h6 class="text-warning">Các màu hợp lệ: Red,Blue, black, gray, white, yellow, pink, purple, orange</h6>
         </small>
      </div>
   </div>

   <div class="form-row" id="costinput">
      <div class="form-group col-md-6 offset-md-3">
         <div class="font-weight-bold"> Gía cả <span id="cost"></span></div>
         <input type="number" class="form-control" id="input-cost" name="cost" min="1000" max="10000000000" required>
         <small name="textcost" id="textcost" class="text-form text-muted">
            <h6 class="text-warning">Đơn vị: VNĐ(1000 <= X <=10000000000)</h6> </small> </div> </div> <div class="form-row" id="quantityinput">
                  <div class="form-group col-md-6 offset-md-3">
                     <div class="font-weight-bold"> Số lượng <span id="quantity"></span> </div>
                     <input type="number" class="form-control" id="input-quantity" name="quantity" min="1" max="10000" required>
                     <small name="textcost" id="textcost" class="text-form text-muted">
                        <h6 class="text-warning">Note: 1<= x <=10000</h6> </small> </div> </div> <div class="form-row" id="auction">
                              <div class="form-group col-md-6 offset-md-3">

                                 <label class="font-weight-bold" for="sel1">Select one:</label>

                                 <select class="form-control" id="sel1" name="sel1">
                                    <option value="0">Bán sản phẩm ở trạng thái bình thường( không đấu giá)</option>
                                    <option value="1">Bán sản phẩm ở trạng thái đấu giá</option>

                                 </select>
                              </div>
                  </div>
                  <div class="form-row" id="time" style="display:none;">
                     <div class="form-group col-md-6 offset-md-3">
                        <div class="font-weight-bold"> Thời gian đấu giá đơn vị giờ: <span id="total-time"></span> </div>
                        <input type="number" class="form-control" id="input-time" name="time">
                        <small name="textcolor" id="texttime" class="text-form text-muted">
                           <h6 class="text-warning">Ex: 1 <= giờ <=256</h6> </small> </div> </div> <br>

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