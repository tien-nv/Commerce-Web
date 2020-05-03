<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\ProductProcess;

class ProductController extends Controller{
    public function addProduct(Request $request){
        // return view('home');
        $data = $request->input('selected');
        $query = new ProductProcess();
        $respon = $query->addProduct($data);
        return $respon;
    }
    public function getProduct(Request $request){
        $type = $request->get('typeProduct');
        //query lấy sản phẩm từ chỗ này
        //test ajax
        $obj = array();
        $product['img'] = 'img/product1.jpg';
        $product['userName'] = 'user1';
        $product['nameProduct'] = 'product1';
        $product['cost'] = '2.000 đ';
        $product['location'] = 'Hà Nội';
        $obj[] = $product;
        $product['img'] = 'img/product2.jpg';
        $product['userName'] = 'user2';
        $product['nameProduct'] = 'product2';
        $product['cost'] = '4.000 đ';
        $product['location'] = 'Hà Nội';
        $obj[] = $product;
        json_encode($obj);
        return $obj;
    }
    public function getMoreProduct(Request $request){
        //return object select
        return "getMoreProduct";
    }
    public function productDescription(Request $request){
        //return chi tiết 1 sản phẩm
    }

    //funtion trả về view của trang đăng bán
    public function sellProduct(){
        return view('sell.description');
    }
}
