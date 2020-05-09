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

</head>

<body>
   <section class="jumbotron text-center">
      <div class="container">
          <h1>Shopping Cart</h1>
       </div>
  </section>
  
  <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th scope="col"> </th>
                              <th scope="col">Product</th>
                              <th scope="col" class="text-center">Quantity</th>
                              <th scope="col" class="text-right">Cost</th>
                              <th> </th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr id="item1">
                              <td><img src="img/product/camera/product2.jpg" width="50" height="50" /> </td>
                              <td>Product1</td>
                              <td><input class="form-control" type="number" value="1" min="1" /></td>
                              <td class="text-right">100.000</td>
                              <td class="text-right"><button class="btn btn-sm btn-danger" onclick="remove()"><i class="fa fa-trash"></i> </button> </td>
                          </tr>
                          <tr class="item2">
                              <td><img src="img/product/laptop/tivi.jpg" width="50" height="50"/> </td>
                              <td>Product2</td>
                              
                              <td><input class="form-control" type="number" value="1" min="1"/></td>
                              <td class="text-right">200.000</td>
                              <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                          </tr>
                          <tr class="item3">
                              <td><img src="img/product/camera/tivi.jpg" width="50" height="50"/> </td>
                              <td>Product3</td>
                           
                              <td><input class="form-control" type="number" value="1" min="1" /></td>
                              <td class="text-right">300.000</td>
                              <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                          </tr>

                          <tr id="next">
                              
                          </tr>

                          <tr>
                              <td></td>
                              <td></td>
                              <td class="text-right"><strong>Total</strong></td>
                              <td class="text-right"><strong>600.000</strong></td>
                              <td ></td>
                          </tr>
                          
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="col">
              <div class="row">
                  <div class="col-sm-12  col-md-6 text-left">
                      <a role="button"  class="btn btn-lg btn-block btn-primary text-uppercase" href="{{ route('home') }}" >Continue Shopping</a>
                  </div>
                  <div class="col-sm-12 col-md-6 text-right">
                      <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                  </div>
              </div>
          </div>
      </div>
  </div>

  
  

</body>  
</html>