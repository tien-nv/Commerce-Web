<?php

namespace App\models;

use ArrayObject;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductProcess extends Model
{

    //function add sản phẩm từ phía admin không phải từ phía user
    //đừng dùng function này cho user
    public static function addProduct($data)
    {
        $test2 = DB::table('admin')->get();
        return $test2;
    }


    //function này cho phép lấy $num sản phẩm có $type = ...
    public static function getProductByType($type,$num = 15,$auction = 0)
    {
        if ($type == 'all') {
            $products = DB::table('product')->where('isAuction', '=', $auction)->latest()->limit($num)->get();
            $products = json_decode($products, true);
            return $products;
        } else {
            $products = DB::table('product')->where('Type', 'like', $type)->where('isAuction', '=', $auction)->latest()->limit($num)->get();
            $products = json_decode($products, true);
            return $products;
        }
    }

    //function này cho phép lấy hết tất cả thông tin về sản phẩm có product_id = id
    public static function getProductById($id)
    {
        $products = DB::table('product')->where('Product_ID', '=', $id)->get();
        $products = json_decode($products, true);
        $listImg = $products[0]['Img'];
        if(!$listImg){
            $products[0]['Img'][] = 'img/defaultProductImg.jpg';
        }else
            $products[0]['Img'] = explode(',', $listImg);
        $listColor = $products[0]['Color'];
        $products[0]['Color'] = explode(',', $listColor);
        return $products[0];
    }

    //function lấy những sản phẩm đang trong trạng thái đấu giá
    public static function getProductIsAuction($num=15)
    {
        $products = DB::table('product')->where('isAuction', '=', 1)->latest()->limit($num)->get();
        $products = json_decode($products, true);
        return $products;
    }

    //function check xem những sản phẩm đấu giá còn trong khoảng thời gian hợp lệ hay không
    public static function checkAuctionTime($product_create,$totalTime){
        date_default_timezone_set("Asia/Saigon");
        $created = strtotime($product_create); //chuyển từ ngày tháng về với giây
        //thời điểm hiện tại tính bằng s
        $now = time();
        $sub = $now - $created;
        if($sub < $totalTime){
            return $totalTime-$sub;
        }
        return 0;
    }

    //function get sản phẩm theo search
    public static function getProductByName($search,$auction=0){
        $search = $search.'%';
        $orders = DB::table('product')
                        ->where('Product_Name','like',$search)
                        ->where('isAuction','=',$auction)->latest()->get();
        $orders = json_decode($orders,true);
        return $orders;
    }

    //function get sản phẩm theo category và search
    public static function getProductByNameAndType($search,$category,$auction=0){
        $search = $search.'%';
        $orders = DB::table('product')
                        ->where('Product_Name','like',$search)->where('Type','like',$category)
                        ->where('isAuction','=',$auction)->latest()->get();
        $orders = json_decode($orders,true);
        return $orders;
    }
}
