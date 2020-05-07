<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\ProductProcess;
use App\models\QueryDB;
use Illuminate\Support\Facades\DB;
use App\Item;
use App\ItemDetails;

class ProductController extends Controller
{
    /***************************************************************
     * quan trọng
    ///lưu ý khi nào cần set giá trị cho session cần gọi session_start();
     **********************************************************************/

    //function này thêm sản phẩm từ phía admin ko phải user
    public function addProduct(Request $request)
    {

        // return view('home');
        $data = $request->input('selected');
        $query = new ProductProcess();
        $respon = $query->addProduct($data);
        return $respon;
    }

    //lấy sản phẩm theo type
    public function getProduct(Request $request)
    {
        session_start();
        $_SESSION['isAuction'] = 0;
        $type = $request->get('typeProduct');
        //query lấy sản phẩm từ chỗ này
        $_SESSION['type'] = $type;
        $products = ProductProcess::getProductByType($type);
        for ($i = 0; $i < count($products); $i++) {
            if (!$products[$i]['Img']) { //nếu không có ảnh mô tả thì gán ảnh mặc định
                $products[$i]['Img'] = "img/defaultProductImg.jpg";
            } else {
                $products[$i]['Img'] = explode(',', $products[$i]['Img'])[0];
            }
        }
        return $products;
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
                if (!$products[$i]['Img']) {
                    $products[$i]['Img'] = "img/defaultProductImg.jpg";
                } else {
                    $products[$i]['Img'] = explode(',', $products[$i]['Img'])[0];
                }
                // $products[$i]['Color'] = explode(',',$products[$i]['Color']);
                $products[$i]['auction'] = 0;
            }

            return $products;
        } else {
            $products = ProductProcess::getProductByType($_SESSION['type'], $currProducts + 15, 1);
            for ($i = 0; $i < count($products); $i++) {
                if (!$products[$i]['Img']) {
                    $products[$i]['Img'] = "img/defaultProductImg.jpg";
                } else {
                    $products[$i]['Img'] = explode(',', $products[$i]['Img'])[0];
                }
                // $products[$i]['Color'] = explode(',',$products[$i]['Color']);
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
            DB::table('auction')
                ->updateOrInsert(
                    ['User_Name' => $_SESSION['userName_cw'], 'Product_ID' => $id, 'Cost' => $cost]
                );
            $maxCost = DB::table('auction')->where('Product_ID', '=', $id)->max('Cost');
            $myMax = max($product['Cost'], $maxCost);
            return $myMax;
        } else
            return -1;
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
        for ($i = 0; $i < count($orders); $i++) {
            if (!$orders[$i]['Img']) {
                $orders[$i]['Img'] = "img/defaultProductImg.jpg";
            } else {
                $orders[$i]['Img'] = explode(',', $orders[$i]['Img'])[0];
            }
            // $products[$i]['Color'] = explode(',',$products[$i]['Color']);
            $orders[$i]['auction'] = $auction;
        }
        return $orders;
    }

    // fuction xử lý upload, update
    public function sellSuccess(Request $request)
    {
        $this->validate($request, [
            'images' => 'required'
        ]);

        if ($request->hasFile('images')) {
            $allowFileExtension = ['jpg', 'png', 'jpeg', 'gif'];
            $files = $request->file('images');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();

                $check = in_array($extension, $allowFileExtension);
                if ($check) {

                    $items = Item::create([
                        'username' => 'TienHoang',    // chỗ này ông thay bằng username hiện tại nha
                        'name' => $request->name,
                        'type' => $request->type,
                        'color' => $request->color,
                        'cost' => $request->cost,
                        'quantity' => $request->quantity,
                        'des1' => "Description1",  // chô này t ko dùng dc $request->description1
                        'des2' => "Description2",   //
                        'des3' => "Description3",   //
                        'des4' => "Description4",   //
                    ]);
                    foreach ($request->images as $image) {
                        $filename = $image->store('image');  // image được lưu ở storage/image
                        ItemDetails::create([
                            'item_id' => $items->id,
                            'filename' => $filename
                        ]);
                    }
                    echo "Upload Succesful";
                    break;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
        }
    }
}
