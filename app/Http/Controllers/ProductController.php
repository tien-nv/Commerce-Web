<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\AdminProcess;//sử dụng file adminProcess
use App\models\ProductProcess;
use App\Http\Controllers\LoginController;

class ProductController extends Controller{
    public function addProduct(Request $request){
        // return view('home');
        $data = $request->input('selected');
        $process = new adminProcess();
        return $process->addProduct($data);
    }
    public function getProduct(Request $request){
        $type = $request->get('typeProduct');
        //query lấy sản phẩm từ chỗ này
        // if($type == 'all') {
        //     $home = new LoginController();
        //     return $home->getHomeView();
        // }
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
}
