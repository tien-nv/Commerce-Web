<!DOCTYPE html>
<html lang="vi-vn">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title> @yield('title') </title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="bin\\bootstrap441\\css\\bootstrap.min.css">
   <script src="bin\\jquery341\\jquery.min.js"></script>
   <script src="bin\\bootstrap441\\js\\bootstrap.min.js"></script>
   <script src="js/buy.js"></script>
   <style>
      .payment-form {
         padding-bottom: 50px;
         font-family: 'Montserrat', sans-serif;
      }

      .payment-form.dark {
         background-color: #f6f6f6;
      }

      .payment-form .content {
         box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
         background-color: white;
      }

      .payment-form .block-heading {
         padding-top: 50px;
         margin-bottom: 40px;
         text-align: center;
      }

      .payment-form .block-heading p {
         text-align: center;
         max-width: 420px;
         margin: auto;
         opacity: 0.7;
      }

      .payment-form.dark .block-heading p {
         opacity: 0.8;
      }

      .payment-form .block-heading h1,
      .payment-form .block-heading h2,
      .payment-form .block-heading h3 {
         margin-bottom: 1.2rem;
         color: #3b99e0;
      }

      .payment-form form {
         border-top: 2px solid #5ea4f3;
         box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
         background-color: #ffffff;
         padding: 0;
         max-width: 600px;
         margin: auto;
      }

      .payment-form .title {
         font-size: 1em;
         border-bottom: 1px solid rgba(0, 0, 0, 0.1);
         margin-bottom: 0.8em;
         font-weight: 600;
         padding-bottom: 8px;
      }

      .payment-form .products {
         background-color: #f7fbff;
         padding: 25px;
      }

      .payment-form .products .item {
         margin-bottom: 1em;
      }

      .payment-form .products .item-name {
         font-weight: 600;
         font-size: 0.9em;
      }

      .payment-form .products .item-description {
         font-size: 0.8em;
         opacity: 0.6;
      }

      .payment-form .products .item p {
         margin-bottom: 0.2em;
      }

      .payment-form .products .price {
         float: right;
         font-weight: 600;
         font-size: 0.9em;
      }

      .payment-form .products .total {
         border-top: 1px solid rgba(0, 0, 0, 0.1);
         margin-top: 10px;
         padding-top: 19px;
         font-weight: 600;
         line-height: 1;
      }
   </style>
</head>

<body>
   <div class="page payment-page">
      <div class="payment-form dark">
         <div class="container">
            <div class="block-heading">
               <h2>Payment</h2>
            </div>
            <form>
               {{ csrf_field() }}
               <div class="products">
                  <h3 class="title">Tất cả sản phẩm</h3>
                  <div id="items">
                     @for($i=0; $i < $len ; $i++) 
                     <div class="item">
                        <span class="price">Số lượng: {{ $cart[$i]['Count'] }} </span>
                        <p class="item-name">{{ $cart[$i]['Product_Name'] }}</p>
                        <p class="item-description">Đơn giá: {{ $cart[$i]['Cost'] }} <strong> VNĐ</strong></p>
                  </div>
                  @endfor
                  <div class="total">Tổng tiền<span class="price"><strong> {{ $total }} VNĐ</strong></span></div>
               </div>
         </div>

         <div class="form-group col-sm-12" style="display: flex;justify-content: space-around;">
            <button type="button" class="btn btn-outline-danger" onclick="pay()">Mua</button>
            <a href="{{ route('showCart') }}"><button type="button" class="btn btn-outline-dark">Quay lại</button></a>
         </div>
      </div>
   </div>
   </form>
   </div>
   </div>
   </div>
</body>

</html>