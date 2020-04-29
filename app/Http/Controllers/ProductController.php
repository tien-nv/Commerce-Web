<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\AdminProcess;//sử dụng file adminProcess
use App\models\ProductProcess;

class ProductController extends Controller{
    public function addProduct(Request $request){
        // return view('home');
        $data = $request->input('selected');
        $process = new adminProcess();
        return $process->addProduct($data);
    }
    public function getProduct(Request $request){
        $name = $request->get('nameProduct');
        return $name;
    }
}
