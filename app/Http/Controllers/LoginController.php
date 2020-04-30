<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\AccountProcess; //sử dụng file này để lấy các kết quả query để check account
use App\models\QueryDB;

class LoginController extends Controller
{
    /***************************************
     *              TRANG CHỦ FUNCTION
     ******************************************/
    public function getHomeView()
    {
        if (!isset($_COOKIE['userName_cw']) || !isset($_COOKIE['password_cw'])) { //userName_commerceWeb
            return view('home');
        } else {
            $userName = $_COOKIE['userName_cw'];
            $password = $_COOKIE['password_cw'];
            $userName = decrypt($userName);
            $password = decrypt($password); // ra plain text

            $password = hash("ripemd160", $password);
            //gọi đến hàm kiểm tra
            $check = AccountProcess::checkUserLogin($userName, $password);
            // nếu hợp lệ
            if ($check === true)
                return view('home', compact('userName', 'check'));
            else {
                //hủy bỏ cookies
                $cookie_username = 'userName_cw';
                $cookie_password = 'password_cw';
                setcookie($cookie_username, "", time() - 3600); //
                //mật khẩu
                setcookie($cookie_password, "", time() - 3600); //
                return view('home', compact('check'));
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
        $query = new QueryDB();
        $resultRegister = $query->addUser($userName, $password_hash, $address, $email, $phone,$gender,$birthday);
        if ($resultRegister) {
            //set session
            session_start();
            $_SESSION['userName_cw'] = $userName;
            $_SESSION['password_cw'] = $password_hash; //password này đã được mã hóa hash

            //mã hóa tên các trường
            $cookie_username = 'userName_cw';
            $cookie_password = 'password_cw';
            // $cookie_username = encrypt($cookie_username);
            // $cookie_password = encrypt($cookie_password);
            //mã hóa username và password
            $userName_encry = encrypt($userName);
            $password_encry = encrypt($password);
            //đặt cookies là cái mã hóa
            setcookie($cookie_username, $userName_encry, time() + (86400 * 30)); //1 day
            //mật khẩu
            setcookie($cookie_password, $password_encry, time() + (86400 * 30)); //1 day
            //trả về tên dạng plaintext
            //nếu thành công thì dadwndg nhập và hiện thị thông báo
            return view('home', compact('userName', 'resultRegister'));
        } else {
            // không thì hiện thị khoogn thành công
            return view('home', compact('resultRegister'));
        }
    }

    public function checkAdminRegister(Request $request){
        $adminName = $request->get("inputVal");
        $respon = AccountProcess::isAdminNameOk($adminName);
        return $respon;
    }

    public function getAdminRegister(Request $request){
        $adminName = $request->get('adminName');
        $password = $request->get('password');

        $password = hash('ripemd160', $password); //mã hóa hash rồi vứt vào database
        $query = new QueryDB();
        $field = array('Admin_Id','Admin_Name','Password'); //Admin_Id là Null
        $data = array($adminName,$password);
        $resultRegister = $query->addToTable('admin',$field,$data);
        return $resultRegister;
    }

    /**************************************************
     *                  LOGIN FUNCTION
     -------------------------------------------------*/
    //funtion này check login của 1 username
    public function getUserLogin(Request $request)
    {
        $userName = $request->input('usernameLogin');
        $password_plaintext = $request->input('passwordLogin');
        $password = hash("ripemd160", $password_plaintext);
        $check = AccountProcess::checkUserLogin($userName, $password);
        //nếu khong hợp lệ thì trả về thông báo khoogn hợp lệ
        if ($check === false) return view('home', compact('check'));
        //gọi hàm check tài khoản
        //nếu hợp lệ thì set cookies
        //set session
        session_start();
        $_SESSION['userName_cw'] = $userName;
        $_SESSION['password_cw'] = $password; //password này đã được mã hóa hash

        //mã hóa tên các trường
        $cookie_username = 'userName_cw';
        $cookie_password = 'password_cw';
        // $cookie_username = encrypt($cookie_username);
        // $cookie_password = encrypt($cookie_password);
        //mã hóa username và password
        $userName_encry = encrypt($userName);
        $password_encry = encrypt($password_plaintext);

        //đặt cookies là cái mã hóa
        setcookie($cookie_username, $userName_encry, time() + (86400 * 30)); //1 day
        //mật khẩu

        setcookie($cookie_password, $password_encry, time() + (86400 * 30)); //1 day

        //trả về tên dạng plaintext
        return view('home', compact('userName', 'check'));
    }

    //funtion này check login của 1 admin
    public function getAdminLogin(Request $request)
    {
        $adminName = $request->input('adminLogin');
        $password = $request->input('passwordAdminLogin');
        // echo $password;
        $password = hash('ripemd160', $password);
        //gọi hàm check account
        $check = AccountProcess::checkAdminLogin($adminName,$password);
        if ($check === false) return view('home', compact('check'));
        //nếu hợp lệ thì set sessions

        //set session
        session_start();
        $_SESSION['adminName'] = $adminName;
        $_SESSION['passwordAdmin'] = $password;
        return view('adminpage', compact('adminName'));
    }

    /*----------------------------------------------------------
                LOGOUT FUNCTION
    -----------------------------------------------------------*/
    //logout function
    public function logOutUser()
    {
        //hủy bỏ session
        session_unset();

        //hủy bỏ cookies
        $cookie_username = 'userName_cw';
        $cookie_password = 'password_cw';
        setcookie($cookie_username, "", time() - 3600); //
        //mật khẩu
        setcookie($cookie_password, "", time() - 3600); //

        return (view('home'));
    }

    public function logOutAdmin()
    {
        session_unset();
        return (view('home'));
    }
}
