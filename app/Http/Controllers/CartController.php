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
        //available = 1 là những sản phẩm đã thêm vào giỏ hàng sẽ mua
        //xóa đi thì avaiable là 0
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
        $user_product = DB::table('user_product')->select()->where('ID', '=', $id)->get();
        $user_product = json_decode($user_product,true);
        $product = ProductProcess::getProductById($user_product[0]['Product_ID']);
        DB::table('product')->where('Product_ID','=',$user_product[0]['Product_ID'])->update(
            ['Available'=>($product['Available'] + $user_product[0]['Count'])]
        );
        $res = [];
        $res['id'] = '#'.$id; 
        return $res;
    }


    public function showPayment()
    {
        $cart = DB::table('user_product')->select('ID','Product_ID', 'Count')
            ->where('Available', '=', 1)
            ->where('User_ID', '=', $_SESSION['idUser'])->get();
        $cart = json_decode($cart, true);
        $len = count($cart);
        $total = 0;
        for ($i = 0; $i < $len; $i++) {
            $product = ProductProcess::getProductById($cart[$i]['Product_ID']);
            $cart[$i]['Product_Name'] = $product['Product_Name'];
            $cart[$i]['Cost'] = $product['Cost'];
            $cart[$i]['Total'] = $product['Cost'] * $cart[$i]['Count'];
            $total += $cart[$i]['Total'];
        }
        return view('cart.payment',compact('cart','len','total'));
    }


    public function payCart(Request $request){
        date_default_timezone_set("Asia/Saigon");
        $cart = DB::table('user_product')->select('Product_ID', 'Count')
            ->where('Available', '=', 1)
            ->where('User_ID', '=', $_SESSION['idUser'])->get();
        $cart = json_decode($cart, true);
        for($i=0;$i<count($cart);$i++){
            $product = ProductProcess::getProductById($cart[$i]['Product_ID']);
            // Name Product_ID Cost Count Total Create_At User_ID
            DB::table('order_detail')->insert(
                ['Name'=>$product['Product_Name'],'Product_ID'=>$product['Product_ID'],
                'Cost'=>$product['Cost'],'Count'=>$cart[$i]['Count'],
                'Total'=>$product['Cost']*$cart[$i]['Count'],
                'Create_At'=> date('Y-m-d H:i:s'),
                'User_ID'=>$_SESSION['idUser']]
            );
        }
        return DB::table('user_product')->where('User_ID', '=', $_SESSION['idUser'])->update(['Available' => 0]);
    }
}
