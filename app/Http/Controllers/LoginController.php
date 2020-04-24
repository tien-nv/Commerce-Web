<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\accountProcess; //sử dụng file này để lấy các kết quả query để check account
use App\models\QueryDB;

class LoginController extends Controller{
    /***************************************
     *              TRANG CHỦ FUNCTION
     ******************************************/
    public function getHomeView(){
        if(!isset($_COOKIE['userName_cw']) || !isset($_COOKIE['password_cw'])) { //userName_commerceWeb
            return view('home');
        } else {
            $userName = $_COOKIE['userName_cw'];
            $password = $_COOKIE['password_cw'];
            //gọi đến hàm kiểm tra
            $check = accountProcess::checkUserLogin($userName,$password);
            // nếu hợp lệ
            if($check === true)
                return view('home',compact('userName','check'));
            else{
                return view('home',compact('check'));
            }
            // nếu không hợp lệ: return view('home');
        }
        
    }
    /*************************************************
     *                  REGISTER FUNCTION
     **************************************************/
    public function getUserRegister(Request $request){
        $email = $request->input('emailRegister');
        $userName = $request->input('userRegister');
        $password = $request->input('passwordRegister');
        $phone = $request->input('phoneRegister');
        $userRole = $request->input('sel1');
        $address = $request->input('address');
        
        $query = new QueryDB();
        $resultRegister = $query->addUser($userRole,$userName,$password,$address,$email,$phone);
        if($resultRegister){
            //nếu thành công thì dadwndg nhập và hiện thị thông báo
            return view('home',compact('userName','resultRegister'));
        }else{
            // không thì hiện thị khoogn thành công
            return view('home',compact('resultRegister'));
        }
    }


    public function getAdminRegister(){

    }

    /**************************************************
     *                  LOGIN FUNCTION
     -------------------------------------------------*/
    //funtion này check login của 1 username
    public function getUserLogin(Request $request){
        $userName = $request->input('usernameLogin');
        $password = $request->input('passwordLogin');
        $check = accountProcess::checkUserLogin($userName,$password);
        //nếu khong hợp lệ thì trả về thông báo khoogn hợp lệ
        if($check === false) return view('home',compact('check'));
        //gọi hàm check tài khoản
        //nếu hợp lệ thì set cookies
        $cookie_username = 'userName_cw';
        $cookie_password = 'password_cw';
        setcookie($cookie_username, $userName, time() + (86400 * 30)); //1 day
        //mật khẩu
        setcookie($cookie_password, $password, time() + (86400 * 30)); //1 day
        
        //set session
        session_start();
        $_SESSION['userName'] = $userName;
        $_SESSION['password'] = $password;

        return view('home',compact('userName','check'));
    }

    //funtion này check login của 1 admin
    public function getAdminLogin(Request $request){
        $adminName = $request->input('adminLogin');
        $password = $request->input('passwordAdminLogin');
        //gọi hàm check account

        //nếu hợp lệ thì set sessions
        
        //set session
        session_start();
        $_SESSION['adminName'] = $adminName;
        $_SESSION['passwordAdmin'] = $password;
        return view('adminpage',compact('adminName'));
    }

    /*----------------------------------------------------------
                LOGOUT FUNCTION
    -----------------------------------------------------------*/
    //logout function
    public function logOutUser(){
        //hủy bỏ session
        session_unset();

        //hủy bỏ cookies
        $cookie_username = 'userName_cw';
        $cookie_password = 'password_cw';
        setcookie($cookie_username, "", time() - 3600); //
        //mật khẩu
        setcookie($cookie_password, "", time() - 3600); //

        return(view('home'));
    }

    public function logOutAdmin(){
        session_unset();
        return(view('home'));
    }


}
