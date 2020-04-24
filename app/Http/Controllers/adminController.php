<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\adminProcess;//sử dụng file adminProcess

class adminController extends Controller{
    public function addProduct(Request $request){
        // return view('home');
        $data = $request->input('selected');
        $process = new adminProcess();
        return $process->addProduct($data);
    }
}
