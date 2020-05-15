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

    //function lấy các sản phẩm từ bảng user đăng bán
    public function getSellProduct(Request $request){
        $userSeller = DB::table('user_seller')->select()->get();
        $userSeller = json_decode($userSeller,true);
        return $userSeller;
    }

    //funciton thêm từng sản phẩm một
    public function addSingleProduct(Request $request){
        $id = $request->get('id');
        $userSeller = DB::table('user_seller')->select()->where('ID','=',$id)->get();
        DB::table('user_seller')->where('ID','=',$id)->delete();
        $userSeller = json_decode($userSeller,true);
        if(count($userSeller) > 0){
            $temp = DB::table("product")->insert(
                [
                    'Product_Name' =>$userSeller[0]['Product_Name'],
                    'Type'=>$userSeller[0]['Type'] ,
                    'Color' =>$userSeller[0]['Color'],
                    'Description'=>$userSeller[0]['Descriptions'],
                    'Cost' =>$userSeller[0]['Cost'],
                    'Available' =>$userSeller[0]['Quantity'],
                    'Sold' => 0,
                    'Img' =>$userSeller[0]['Img'],
                    'Seller' =>$userSeller[0]['User_Name'],
                    'Created_at' => date('Y-m-d H:i:s') ,
                    'Total'=>$userSeller[0]['Quantity'],
                    'isAuction' =>$userSeller[0]['Is_Auction'],
                    'Total_Time'=>$userSeller[0]['Time_Total'] //đây là thời tổng thời gian đấu giá tính từ thời gian hiện tại
                ]
                );
                return $temp;
        }
        return 0;
    }

    //function xóa 1 sản phẩm
    public function delSingleProduct(Request $request){
        $id = $request->get('id');
        $res = DB::table('user_seller')->where('ID','=',$id)->delete();
        return $res;
    }


    //function này thêm sản phẩm từ phía admin ko phải user
    //thêm tất cả sản phẩm từ bảng seller
    public function addAllProduct(Request $request)
    {
        date_default_timezone_set("Asia/Saigon");
        // return view('home');
        // return "ok";
        $userSeller = DB::table('user_seller')->select()->get();
        DB::table('user_seller')->delete();
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

    public function delAllProduct(Request $request){
        $res = DB::table('user_seller')->delete();
        return $res;
    }
}
