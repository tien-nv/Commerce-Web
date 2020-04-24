<?php

namespace App\models;

use ArrayObject;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Model;

class QueryDB extends Model
{
    //
    
    public static function login($host = 'localhost:3306',$username='tien',$password='12345678',$database='commerceweb'){
        return mysqli_connect($host,$username,$password,$database);   
    }

    public function addUser($userRole,$userName,$password,$address,$email,$phone){
        $connect = self::login();
        if ($connect->connect_error) {
            return false;
        }
        $sql = "INSERT INTO user (User_ID, User_Role, UserName, Password, Address, Mail, Phone)
        VALUES (NULL,'".$userRole."','".$userName."','".$password."','".$address."','".$email."','".$phone."')";
        $accept = $connect->query($sql);
        $connect->close();
        return $accept;
    }

    public function select($table,...$field){
        //funtion này truyền biến thì các trường query
        // ví dụ select('user','UserName','Password')
        $connect = self::login();
        if ($connect->connect_error) {
            return NULL;
        }
        $sql = "SELECT ";
        foreach($field as $element){
            $sql .= $element.",";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .= " from ".$table;
        $result = $connect->query($sql);
        $object = array();
        while($row = $result->fetch_assoc()){
            $object[] = $row;
        }
        $connect->close();
        return $object;
    }

}