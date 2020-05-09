<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\models\ProductProcess;

class CartController extends Controller
{
    public function showCart(Request $request)
    {
        $cart = DB::table('user_product')->select('ID','Product_ID', 'Count')
            ->where('Available', '=', 1)
            ->where('User_ID', '=', $_SESSION['idUser'])->get();
        $cart = json_decode($cart, true);
        $len = count($cart);
        $total = 0;
        for ($i = 0; $i < $len; $i++) {
            $product = ProductProcess::getProductById($cart[$i]['Product_ID']);
            $cart[$i]['Img'] = $product['Img'];
            $cart[$i]['Product_Name'] = $product['Product_Name'];
            $cart[$i]['Cost'] = $product['Cost'];
            $cart[$i]['Total'] = $product['Cost'] * $cart[$i]['Count'];
            $total += $cart[$i]['Total'];
        }
        return view('cart.showCart', compact('cart', 'len', 'total'));
    }

    public function removeCart(Request $request)
    {
        $id = $request->get('id');
        DB::table('user_product')->where('ID', '=', $id)->update(['Available' => 0]);
        return '#' . $id;
    }


    public function showPayment()
    {
        return view('cart.payment');
    }
}
