<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\ProductProcess;

use App\Item;
use App\ItemDetails;


class ProductController extends Controller{
    public function addProduct(Request $request){
        // return view('home');
        $data = $request->input('selected');
        $query = new ProductProcess();
        $respon = $query->addProduct($data);
        return $respon;
    }
    public function getProduct(Request $request){
        $type = $request->get('typeProduct');
        //query lấy sản phẩm từ chỗ này
        //test ajax
        $obj = array();
        $product['img'] = 'img/product1.jpg';
        $product['userName'] = 'user1';
        $product['nameProduct'] = 'product1';
        $product['cost'] = '2.000 đ';
        $product['location'] = 'Hà Nội';
        $obj[] = $product;
        $product['img'] = 'img/product2.jpg';
        $product['userName'] = 'user2';
        $product['nameProduct'] = 'product2';
        $product['cost'] = '4.000 đ';
        $product['location'] = 'Hà Nội';
        $obj[] = $product;
        json_encode($obj);
        return $obj;
    }
    public function getMoreProduct(Request $request){
        //return object select
        return "getMoreProduct";
    }
    public function productDescription(Request $request){
        //return chi tiết 1 sản phẩm
    }

    //funtion trả về view của trang đăng bán
    public function sellProduct(){
        return view('sell.description');
    }

    // fuction xử lý upload, update
    public function sellSuccess(Request $request){
        $this->validate($request, [
            'images' => 'required'
        ]);

        if($request->hasFile('images')){
            $allowFileExtension = ['jpg', 'png', 'jpeg', 'gif'];
            $files = $request->file('images');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();

                $check = in_array($extension, $allowFileExtension);
                if($check){
                    
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
                    foreach($request->images as $image){
                        $filename = $image->store('image');  // image được lưu ở storage/image
                        ItemDetails::create([
                            'item_id' => $items->id ,
                            'filename' => $filename
                        ]);
                    }
                    echo "Upload Succesful"; 
                    break;
                }
                else
                    {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                    }
            }
        }


    }

    
} ?>
