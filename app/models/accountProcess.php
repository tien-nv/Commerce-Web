<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\QueryDB;

class AccountProcess extends Model
{
    //funtion kiểm tra tên user name đăng kí là hợp lệ hay không
    public static function isUsernameOk($userInput){
        $query = new QueryDB();
        $obj = $query->select('user','UserName');
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
        $obj = $query->select('user','Mail');
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
        $obj = $query->select('user','Phone');
        for($i=0;$i<count($obj);$i++){
            if(strcmp($obj[$i]["Phone"],$userInput) == 0){
                return 0;
            }
        }
        return 1;
    }

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
}
