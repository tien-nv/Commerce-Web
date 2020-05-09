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
        a:hover {
            text-decoration: none;
        }
    </style>
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
                        <!-- <tbody> -->
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col" class="text-center">Số lượng</th>
                                <th scope="col" class="text-right">Đơn giá</th>
                                <th> </th>
                            </tr>
                            <!-- -->
                            @for($i = 0;$i < $len;$i++)
                            <tr id="{{ $cart[$i]['ID'] }}">
                                <td><img src="{{ $cart[$i]['Img'][0] }}" width="50" height="50" /> </td>
                                <td>{{ $cart[$i]['Product_Name'] }}</td>
                                <td> <input class="form-control" type="text" value="{{ $cart[$i]['Count'] }}" disabled /></td>
                                <td class="text-right">{{ $cart[$i]['Cost'] }}</td>
                                <td class="text-right"><button class="btn btn-sm btn-danger" onclick="remove({{ $cart[$i]['ID'] }})"><i class="fa fa-trash"></i> </button> </td>
                            </tr>
                            @endfor

                            <tr id="next">

                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-right"><strong>Tổng</strong></td>
                                <td class="text-right"><strong>{{ $total }}</strong><span><strong> VNĐ</strong></span></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                <div class="row" style="margin-bottom: 50px">
                    <div class="col-sm-12  col-md-6 text-left">
                        <a role="button" class="btn btn-lg btn-block btn-primary text-uppercase" href="{{ route('home') }}">Tiếp tục mua sắm</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="{{ route('showPayment') }}"> <button class="btn btn-lg btn-block btn-success text-uppercase">Thanh toán</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>