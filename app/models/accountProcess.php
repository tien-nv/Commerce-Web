<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\QueryDB;

class AccountProcess extends Model
{
    /**-----------------------------------------------------------------------------
     * Những function kiểm tra người người dùng nhập vào các tài khoản có
     * bị trùng hay không
     * ------------------------------------------------------------------------------
     */
    //funtion kiểm tra tên user name đăng kí là hợp lệ hay không
    public static function isUsernameOk($userInput){
        $query = new QueryDB();
        $obj = $query->select('user_not_active','UserName');
        for($i=0;$i<count($obj);$i++){
            if(strcmp($obj[$i]["UserName"],$userInput) == 0){
                return 0;
            }
        }
        return 1;
    }

    //funtion kiểm tra tên email người dùng đăng kí là hợp lệ hay không đã tồn tại hay chưa
    public static function isEmailOk($userInput){
        $query = new QueryDB();
        $obj = $query->select('user_not_active','Mail');
        for($i=0;$i<count($obj);$i++){
            if(strcmp($obj[$i]["Mail"],$userInput) == 0){
                return 0;
            }
        }
        return 1;
    }

    //funtion kiểm tra xem số điện thoại người dùng nhập vào có bị trùng ko
    public static function isPhoneOk($userInput){
        $query = new QueryDB();
        $obj = $query->select('user_not_active','Phone');
        for($i=0;$i<count($obj);$i++){
            if(strcmp($obj[$i]["Phone"],$userInput) == 0){
                return 0;
            }
        }
        return 1;
    }

    /**--------------------------------------------------------------------------------
     * function kiểm tra xem những trường mà khi thêm mới 1 admin có bị trùng hay không
     * --------------------------------------------------------------------------------
     */
    //function kiểm tra xem tên admin thêm vào có hợp lệ hay không 
    public static function isAdminNameOk($adminInput){
        $query = new QueryDB();
        $obj = $query->select('admin','Admin_Name');
        for($i=0;$i<count($obj);$i++){
            if(strcmp($obj[$i]["Admin_Name"],$adminInput) == 0){
                return 0;
            }
        }
        return 1;
    }

    /**-----------------------------------------------------------------------------------
     * function kiểm tra đăng nhập
     * -----------------------------------------------------------------------------------
     */
    //funtion kiểm tra tài khoản đăng nhập là hợp lệ không
    public static function checkUserLogin($userName,$password){
        $query = new QueryDB();
        $obj = $query->select('user','UserName','Password');
        for($i=0;$i<count($obj);$i++){
            if(strcmp($obj[$i]["UserName"],$userName) == 0){
                if(strcmp($obj[$i]["Password"],$password) == 0) return true;
            }
        }
        return false;
    }

    //kiểm tra đăng nhập với tài khoản chưa active email
    public static function isActive($userName,$password){
        $query = new QueryDB();
        $obj = $query->select('user_not_active','UserName','Password');
        for($i=0;$i<count($obj);$i++){
            if(strcmp($obj[$i]["UserName"],$userName) == 0){
                if(strcmp($obj[$i]["Password"],$password) == 0) return true;
            }
        }
        return false;
    }

    //kiểm tra admin dăng nhập
    public static function checkAdminLogin($adminName,$password){
        $query = new QueryDB();
        $obj = $query->select('admin','Admin_Name','Password');
        for($i=0;$i<count($obj);$i++){
            if(strcmp($obj[$i]["Admin_Name"],$adminName) == 0){
                if(strcmp($obj[$i]["Password"],$password) == 0) return true;
            }
        }
        return false;
    }

    /**
     * 
     */
}
