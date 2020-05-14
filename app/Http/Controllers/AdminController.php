<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller{

    //function này xóa 1 tài khoản admin
    public function removeAdmin(Request $request){
        $id = $request->get('id');
        $result = DB::table('admin')->where('Admin_ID','=',$id)->delete();
        return $result;
    }

    //function này giúp lấy về từ database các tài khoản admin
    public function getAdmin(Request $request){
        $result = DB::table('admin')->select('Admin_ID','Admin_Name')->where('Admin_ID','<>',$_SESSION['idAdmin'])->get();
        return $result;
    }

    //function này thêm sản phẩm từ phía admin ko phải user
    public function addProduct(Request $request)
    {
        date_default_timezone_set("Asia/Saigon");
        // return view('home');
        // return "ok";
        $userSeller = DB::table('user_seller')->select()->get();
        $userSeller = json_decode($userSeller,true);
        $j = 0;
        // return count($userSeller);
        // return $userSeller[0]['Time_Total'];
        for($i = 0 ;$i < count($userSeller);$i++){
            $temp = DB::table("product")->insert(
                [
                    'Product_Name' =>$userSeller[$i]['Product_Name'],
                    'Type'=>$userSeller[$i]['Type'] ,
                    'Color' =>$userSeller[$i]['Color'],
                    'Description'=>$userSeller[$i]['Descriptions'],
                    'Cost' =>$userSeller[$i]['Cost'],
                    'Available' =>$userSeller[$i]['Quantity'],
                    'Sold' => 0,
                    'Img' =>$userSeller[$i]['Img'],
                    'Seller' =>$userSeller[$i]['User_Name'],
                    'Created_at' => date('Y-m-d H:i:s') ,
                    'Total'=>$userSeller[$i]['Quantity'],
                    'isAuction' =>$userSeller[$i]['Is_Auction'],
                    'Total_Time'=>$userSeller[$i]['Time_Total'] //đây là thời tổng thời gian đấu giá tính từ thời gian hiện tại
                ]
                );
                $j += $temp;
        }
        return $j;
    }
}
