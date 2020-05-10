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

    public function addUser($userName,$password,$address,$email,$phone,$gender,$birthday,$code){
        $connect = self::login();
        if ($connect->connect_error) {
            return false;
        }
        $sql = "INSERT INTO user_not_active (User_ID, UserName, Password, Address, Mail, Phone, Gender, Birth,Code)
        VALUES (NULL,'".$userName."','".$password."','".$address."','".$email."','".$phone."','".$gender."','".$birthday."','".$code."')";
        $accept = $connect->query($sql);
        $connect->close();
        return $accept;
    }
    
    public function addToTable($table,$field,$data){//mảng field và mảng chứa dữ liệu với từng trường
        //funtion này truyền biến thì các trường query
        // ví dụ select('user','UserName','Password')
        $connect = self::login();
        if ($connect->connect_error) {
            return NULL;
        }
        $sql = "INSERT INTO $table (";
        foreach($field as $element){
            $sql .= $element.",";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .= ") VALUES (NULL"; //null sẽ auto increase 
        foreach($data as $element){
            $sql .= ",'".$element."'";
        }
        $sql .= ")";
        $result = $connect->query($sql);
        $connect->close();
        return $result; //insert thành công hay không
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