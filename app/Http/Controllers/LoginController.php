<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use Illuminate\Http\Request;

use App\models\AccountProcess; //sử dụng file này để lấy các kết quả query để check account
use App\models\ProductProcess;
use App\models\QueryDB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /************************************************
     * Các hàm khởi tạo,hủy bỏ vứt vào đây
     * Khởi tạo session,cookies
     **************************************************/
    private $cookie_username = 'userName_cw';
    private $cookie_password = 'password_cw';

    private function initAdminSession($adminName,$password){
        session_start();
        $_SESSION['adminName'] = $adminName;
        $_SESSION['passwordAdmin'] = $password;
        $_SESSION['isAdmin'] = 'valid';
        $adminId = DB::table('admin')->select('Admin_ID')->where('Admin_Name', '=', $adminName)->get();
        $adminId = json_decode($adminId, true);
        $_SESSION['idAdmin'] = $adminId[0]['Admin_ID'];
    }

    private function initUserSession($userName, $password)
    {
        session_start();
        $_SESSION['userName_cw'] = $userName;
        $_SESSION['password_cw'] = $password; //password này đã được mã hóa hash
        $_SESSION['isUser'] = 'valid';
        //cái biến này lưu trữ dạng sản phẩm mà người dùng đang tương tác
        $_SESSION['type'] = 'all'; //mặc định là all
        //cái biến này lưu trữ người dùng có đang ở trang đấu giá hay không
        $_SESSION['isAuction'] = 0;
        $id = DB::table('user')->select('User_ID')->where('UserName', '=', $userName)->get();
        $id = json_decode($id, true);
        $_SESSION['idUser'] = $id[0]['User_ID'];
    }

    private function initUserCookies($userName, $password)
    {
        //mã hóa username và password
        $userName_encry = encrypt($userName);
        $password_encry = encrypt($password);
        //đặt cookies là cái mã hóa
        setcookie($this->cookie_username, $userName_encry, time() + (86400 * 30)); //1 day
        //mật khẩu
        setcookie($this->cookie_password, $password_encry, time() + (86400 * 30)); //1 day
    }

    private function destroyUserCookies()
    {
        setcookie($this->cookie_username, "", time() - 3600); //
        //mật khẩu
        setcookie($this->cookie_password, "", time() - 3600); //
    }

    /***************************************
     *              TRANG CHỦ FUNCTION
     ******************************************/
    public function resetHomeView()
    {
        session_start();
        $products = ProductProcess::getProductByType('all');
        if(!isset($_SESSION['idUser'])){
            $check = false;
            $alert = 'Xin chào người lạ! Bạn đang ở trạng thái thăm quan hãy đăng nhập để sử dụng.';
            return view('home', compact('products','alert','check'));
        }
        $userName = $_SESSION['userName_cw'];
        //cái biến này lưu trữ dạng sản phẩm mà người dùng đang tương tác
        $_SESSION['type'] = 'all'; //mặc định là all
        //cái biến này lưu trữ người dùng có đang ở trang đấu giá hay không
        $_SESSION['isAuction'] = 0;
        if (strlen($userName) > 6)
            $userName_show = substr($userName, 0, 6) . '...';
        else $userName_show = $userName;
        return view('home', compact('userName', 'userName_show', 'products'));
    }
    public function getHomeView()
    {
        if (!isset($_COOKIE['userName_cw']) || !isset($_COOKIE['password_cw'])) { //userName_commerceWeb
            $check = false;
            $products = ProductProcess::getProductByType('all');
            $alert = 'Xin chào người lạ! Bạn đang ở trạng thái thăm quan hãy đăng nhập để sử dụng.';
            return view('home', compact('products','alert','check'));
        } else {
            $userName = $_COOKIE['userName_cw'];
            $password = $_COOKIE['password_cw'];
            $userName = decrypt($userName);
            $password = decrypt($password); // ra plain text

            $password = hash("ripemd160", $password);
            //gọi đến hàm kiểm tra
            $check = AccountProcess::checkUserLogin($userName, $password);
            // nếu hợp lệ
            if ($check === true) {
                //khởi tạo session
                $this->initUserSession($userName, $password);

                if (strlen($userName) > 6)
                    $userName_show = substr($userName, 0, 6) . '...';
                else $userName_show = $userName;
                $products = ProductProcess::getProductByType('all');
                return view('home', compact('userName', 'userName_show', 'products'));
            } else {
                $this->destroyUserCookies();
                $alert = 'Xin chào người lạ! Tôi đã đọc cookies và nó không hợp lệ bạn hãy thử đăng nhập lại xem.';
                $products = ProductProcess::getProductByType('all');
                return view('home', compact('check', 'alert','products'));
            }
            // nếu không hợp lệ: return view('home');
        }
    }
    /*************************************************
     *                  REGISTER FUNCTION
     **************************************************/
    public function checkRegister(Request $request)
    {
        $inputVal = $request->get('inputVal');
        $field = $request->get('field');
        if ($field === 'username') {
            $respon = AccountProcess::isUsernameOk($inputVal);
            return $respon;
        }
        if ($field === 'mail') {
            $respon = AccountProcess::isEmailOk($inputVal);
            return $respon;
        }
        if ($field === 'phone') {
            $respon = AccountProcess::isPhoneOk($inputVal);
            return $respon;
        }
        return 0;
    }

    public function getUserRegister(Request $request)
    {
        $email = $request->input('emailRegister');
        $userName = $request->input('userRegister');
        $password = $request->input('passwordRegister'); //password plaintext
        $phone = $request->input('phoneRegister');
        $gender = $request->input('gender');
        $birthday = $request->input('birthday');
        $address = $request->input('address');
        //mã hóa password người dùng rồi luuwu vào database để đảm bảo quyền riêng tư
        $password_hash = hash('ripemd160', $password); //password hash để lưu vào database
        $token_plaintext = $userName.$email;
        $code = hash('ripemd160',$token_plaintext);
        $query = new QueryDB();
        $resultRegister = $query->addUser($userName, $password_hash, $address, $email, $phone, $gender, $birthday,$code);
        if ($resultRegister) {
            //trả về tên dạng plaintext
            //nếu thành công thì dadwndg nhập và hiện thị thông báo
           
            $token = [
                'token'=> $code,
                'userName' => $userName,
                'email' => $email
            ];
            Mail::to($email)->send(new VerifyEmail($token));
            $products = ProductProcess::getProductByType('all');
            $checkRegister =  true;
            $alert = 'Chúc mừng bạn đã đăng kí thành công. Hãy xác thực email rồi đăng nhập để mua sắm nào. :D';
            return view('home', compact('checkRegister', 'alert','products'));
        } else {
            // không thì hiện thị khoogn thành công
            $products = ProductProcess::getProductByType('all');
            $checkRegister =  false;
            $alert = 'Lỗi đăng kí người dùng. Bạn hãy thử lại xem. Chắc là do tên tài khoản hoặc mật khẩu đã có người dùng. :D';
            return view('home', compact('checkRegister','alert' ,'products'));
        }
    }

    //function dành cho admin
    public function checkAdminRegister(Request $request)
    {
        $adminName = $request->get("inputVal");
        $respon = AccountProcess::isAdminNameOk($adminName);
        return $respon;
    }

    public function getAdminRegister(Request $request)
    {
        $adminName = $request->get('adminName');
        $password = $request->get('password');

        $password = hash('ripemd160', $password); //mã hóa hash rồi vứt vào database
        $query = new QueryDB();
        $field = array('Admin_Id', 'Admin_Name', 'Password'); //Admin_Id là Null
        $data = array($adminName, $password);
        $resultRegister = $query->addToTable('admin', $field, $data);
        return $resultRegister;
    }

    /**************************************************
     *                  LOGIN FUNCTION
     -------------------------------------------------*/
    //funtion này check login của 1 username
    public function getUserLogin(Request $request)
    {
        $userName = $request->input('usernameLogin');
        $password = $request->input('passwordLogin'); //passsword plaintext
        $password_hash = hash("ripemd160", $password);
        $check = AccountProcess::checkUserLogin($userName, $password_hash);
        //nếu khong hợp lệ thì trả về thông báo khoogn hợp lệ
        $products = ProductProcess::getProductByType('all');
        if ($check === false) {
            $checkActive = AccountProcess::isActive($userName, $password_hash);
            if($checkActive === true){
                $alert = 'Chào bạn! Tài khoản này đã được đăng kí nhưng chưa xác thực. Bạn hãy xác thực email.';
                return view('home', compact('check','alert','products'));
            }
            $alert =  'Chào người lạ! Tài khoản hoặc mật khẩu bạn nhập không đúng.';
            return view('home', compact('check', 'alert','products'));
        }
        //khởi tạo session
        $this->initUserSession($userName, $password_hash);
        //khởi tạo cookies
        $this->initUserCookies($userName,$password);

        //trả về tên dạng plaintext
        if (strlen($userName) > 6)
            $userName_show = substr($userName, 0, 6) . '...';
        else $userName_show = $userName;
        $alert = 'Chào '.$userName.'! Bạn đã đăng nhập thành công. Hãy mua sắm thôi nào.';
        return view('home', compact('userName', 'userName_show', 'check','alert', 'products'));
    }

    //funtion này check login của 1 admin
    public function getAdminLogin(Request $request)
    {
        $adminName = $request->input('adminLogin');
        $password = $request->input('passwordAdminLogin');
        // echo $password;
        $password_hash = hash('ripemd160', $password);
        //gọi hàm check account
        $check = AccountProcess::checkAdminLogin($adminName, $password_hash);
        if ($check === false) {
            $products = ProductProcess::getProductByType('all');
            $alert = 'Chào người lạ! Tài khoản và mật khẩu admin của bạn không đúng.';
            return view('home', compact('check', 'alert','products'));
        }
        //nếu hợp lệ thì set sessions

        //set session
        $this->initAdminSession($adminName,$password_hash);
        return view('adminpage', compact('adminName'));
    }

    /*----------------------------------------------------------
                LOGOUT FUNCTION
    -----------------------------------------------------------*/
    //logout function
    public function logOutUser()
    {
        //hủy bỏ session
        session_destroy();
        //hủy bỏ cookies
        $this->destroyUserCookies();
        $products = ProductProcess::getProductByType('all');
        $check = true;
        $alert = 'Bạn đã đăng xuất thành công. Hẹn gặp bạn trong lần mua sắm tiếp theo.';
        return (view('home', compact('products','check','alert')));
    }

    public function logOutAdmin()
    {
        session_destroy();
        $products = ProductProcess::getProductByType('all');
        return (view('home', compact('products')));
    }
}
