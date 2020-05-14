<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\ProductProcess;
use App\models\QueryDB;
use Illuminate\Support\Facades\DB;
use App\models\Item;
use App\models\ItemDetails;

class ProductController extends Controller
{
    /***************************************************************
     * quan trọng
    ///lưu ý khi nào cần set giá trị cho session cần gọi session_start();
     **********************************************************************/


    

    //lấy sản phẩm theo type
    public function getProduct(Request $request)
    {
        $type = $request->get('typeProduct');
        $_SESSION['type'] = $type;
        $products = ProductProcess::getProductByType($type);
        return $products;
    }

    //sắp xếp sản phẩm theo mới nhất
    public function sortNewest(Request $request){
        session_start();
        $currProducts = $request->get('currProducts');
        if ($_SESSION['isAuction'] == 0) {
            //lấy thêm 15 sản phẩm 1 lần
            $products = ProductProcess::getProductByType($_SESSION['type'], $currProducts, 0);
            for ($i = 0; $i < count($products); $i++) {
                $products[$i]['auction'] = 0;
            }
            return $products;
        } else {
            $products = ProductProcess::getProductByType('all', $currProducts, 1);
            for ($i = 0; $i < count($products); $i++) {
                $products[$i]['auction'] = 1;
            }
            return $products;
        }
    }

    //sắp xếp sản phẩm theo rẻ nhất
    public function sortCheapest(Request $request){
        session_start();
        $currProducts = $request->get('currProducts');
        if ($_SESSION['isAuction'] == 0) {
            //lấy thêm 15 sản phẩm 1 lần
            $products = ProductProcess::getProductByType($_SESSION['type'], $currProducts, 0);
            for ($i = 0; $i < count($products); $i++) {
                $products[$i]['auction'] = 0;
            }
            for($i=0; $i < count($products); $i++){
                for($j=$i+1; $j < count($products); $j++){
                    if($products[$i]['Cost'] > $products[$j]['Cost']){
                        $temp = $products[$i];
                        $products[$i] = $products[$j];
                        $products[$j] = $temp;
                    }
                }
            }
            return $products;
        } else {
            $products = ProductProcess::getProductByType('all', $currProducts, 1);
            for ($i = 0; $i < count($products); $i++) {
                $products[$i]['auction'] = 1;
            }
            for($i=0; $i < count($products); $i++){
                for($j=$i+1; $j < count($products); $j++){
                    if($products[$i]['Cost'] > $products[$j]['Cost']){
                        $temp = $products[$i];
                        $products[$i] = $products[$j];
                        $products[$j] = $temp;
                    }
                }
            }
            return $products;
        }
    }


    //function lấy thêm sản phẩm
    public function getMoreProduct(Request $request)
    {
        //return object select
        $currProducts = $request->get('currProducts');
        if ($_SESSION['isAuction'] == 0) {
            //lấy thêm 15 sản phẩm 1 lần
            $products = ProductProcess::getProductByType($_SESSION['type'], $currProducts + 15, 0);
            for ($i = 0; $i < count($products); $i++) {
                $products[$i]['auction'] = 0;
            }
            return $products;
        } else {
            $products = ProductProcess::getProductByType('all', $currProducts + 15, 1);
            for ($i = 0; $i < count($products); $i++) {
                $products[$i]['auction'] = 1;
            }
            return $products;
        }
    }

    //function lấy chi tiết 1 sản phẩm
    public function productDescription(Request $request)
    {
        //return chi tiết 1 sản phẩm
        $id = $request->get('id');
        $_SESSION['idProductAddOrder'] = $id;
        return ProductProcess::getProductById($id); //trả về 1 object
    }

    //funtion trả về view của trang đăng bán
    public function sellProduct()
    {
        return view('sell.description');
    }


    //function chuyển đến giao diện đấu giá
    public function auction()
    {
        $_SESSION['isAuction'] = 1;
        $userName = $_SESSION['userName_cw'];
        if (strlen($userName) > 4)
            $userName_show = substr($userName, 0, 4) . '...';
        else $userName_show = $userName;
        $products = ProductProcess::getProductIsAuction();
        return view('auction.auction', compact('userName', 'userName_show', 'products'));
    }

    //function lấy chi tiết 1 sản phẩm ở trang đấu giá
    public function productAuctionDescription(Request $request)
    {
        $id = $request->get('id');
        $product = ProductProcess::getProductById($id);
        $auctionTime = $product['Total_Time'];
        $check = ProductProcess::checkAuctionTime($product['Created_at'], $auctionTime);
        $product['h'] = (int) ($check / (3600));
        $product['m'] = (int) (($check - $product['h'] * 3600) / 60);
        $product['s'] = $check - $product['h'] * 3600 - $product['m'] * 60;
        return $product; //trả về 1 object
    }

    //function lấy giá trị giá cả mà người dùng đấu giá
    public function pushCost(Request $request)
    {
        $cost = $request->get('cost');
        $id = $request->get('id');
        //check xem sản phẩm này còn time ko
        //lấy datatime hiện tại
        // $temp = array('Y','m','d','G','i','s');
        date_default_timezone_set("Asia/Saigon");
        $product = ProductProcess::getProductById($id);
        $auctionTime = $product['Total_Time'];
        $check = ProductProcess::checkAuctionTime($product['Created_at'], $auctionTime);
        //nếu kiểm tra time mà vẫn còn khoảng thời gian đấu giá
        if ($check > 0) {
            $maxCost = DB::table('auction')->where('Product_ID', '=', $id)->max('Cost');
            $myMax = max($product['Cost'], $maxCost);
            if($cost <= $myMax) return "Bạn phải ra giá lớn hơn";
            DB::table('auction')
                ->updateOrInsert(
                    ['User_Name' => $_SESSION['userName_cw'], 'Product_ID' => $id, 'Cost' => $cost,'User_ID'=>$_SESSION['idUser']]
                );
            return "ra giá thành công hooray!!!! <3";
        } else
            return "Phiên đấu giá kết thúc rồi ra chỗ khác đi bạn eei :D";
    }

    //function cập nhật kỉ lục đấu giá mỗi 1s
    public function updateCost(Request $request)
    {
        $id = $request->get('id');
        $maxCost = DB::table('auction')->where('Product_ID', '=', $id)->max('Cost');
        $basicCost = ProductProcess::getProductById($id)['Cost'];
        $myMax = max($basicCost, $maxCost);
        return $myMax;
    }


    //gợi ý tìm kiểm sản phẩm
    public function searchProducts(Request $request)
    {
        session_start();
        $search = $request->get('key');
        $category = $request->get('type');
        $_SESSION['type'] = $category;
        $auction = 0;
        if (isset($_SESSION['isAuction'])) $auction = $_SESSION['isAuction'];
        if ($category == 'all') {
            $orders = ProductProcess::getProductByName($search, $auction);
        } else {
            $orders = ProductProcess::getProductByNameAndType($search, $category, $auction);
        }
        return $orders;
    }

    // fuction xử lý upload, update
    public function sellSuccess(Request $request)
    {
        date_default_timezone_set("Asia/Saigon");
        $name = $request->get('name');
        $color = $request->get('color');
        $quantity = $request->get('quantity');
        $cost = $request->get('cost');
        $type = $request->get('type');
        $descriptions = $request->get('description1');
        $descriptions .= '[MASK]' . $request->get('description2');
        $descriptions .= '[MASK]' . $request->get('description3');
        $descriptions .= '[MASK]' . $request->get('description4');
        $isAuction = $request->get('sel1');
        $time = $request->get('time');
        if (!$time) {
            $time = 0;
        }
        $time *= 3600; //đổi ra giây
        $files = $request->file('images');
        if ($files) {
            $allowFileExtension = ['jpg', 'png', 'jpeg', 'gif'];
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowFileExtension);
                if (!$check) {
                    $result = 0;
                    return view('sell.description', compact('result'));
                }
            }
            $allImg = "";
            foreach ($files as $file) {
                $newName = $type . date('Ymdhis');
                sleep(1);
                $newName .= '.' . $file->getClientOriginalExtension();
                $file->move($_SERVER['DOCUMENT_ROOT'] . 'img/product/' . $type, $newName);  // image được lưu ở storage/image
                $allImg .= $newName . ',';
            }
        }
        //cắt dấu , ở cuối
        $allImg = substr($allImg,0,strlen($allImg)-1);
        //ID	User_Name	User_ID	Type	Img	Create_At	Quantity	Cost	Color	Descriptions	Product_Name
        DB::table('user_seller')->insert(
            [
                'User_Name' => $_SESSION['userName_cw'], 'User_ID' => $_SESSION['idUser'], 'Type' => $type,
                'Img' => $allImg, 'Create_at' => date('Y-m-d H:i:s'), 'Quantity' => $quantity, 'Cost' => $cost,
                'Color' => $color, 'Descriptions' => $descriptions, 'Product_Name' => $name, 'Is_Auction' => $isAuction, 'Time_Total' => $time
            ]
        );
        $result = 1;
        return view('sell.description', compact('result'));
    }


    //function chuyển đến trang mua sản phẩm
    public function addToCart(Request $request)
    {
        $total = $request->get('total');
        if(!isset($_SESSION['idProductAddOrder'])) return "Thao tác không hợp lệ !!!";
        DB::table('user_product')->insert(
            ['User_ID'=>$_SESSION['idUser'],
            'Product_ID'=>$_SESSION['idProductAddOrder'],
            'Count'=>$total]
        );
        return "Đã thêm sản phẩm vào giỏ hàng";
    }


    //function lấy ra các sản phẩm đã mua của người dùng
    public function boughtProduct(){
        $orders = DB::table('order_detail')->select('Order_ID','Name','Cost','Count','Total','Create_At')
        ->where('User_ID','=',$_SESSION['idUser'])->latest('Create_At')->get();
        $orders = json_decode($orders,true);
        return $orders;
    }
}
