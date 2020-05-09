<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class CartController extends Controller
{
    public function showCart(){
        // $carts = DB::select('select * from mycart');
        return view('cart.showCart');
    }


    public function showPayment(){
        return view('cart.payment');
    }
}
