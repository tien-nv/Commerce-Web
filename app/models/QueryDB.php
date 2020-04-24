<?php

namespace App\models;

use ArrayObject;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Model;

class QueryDB extends Model
{
    //
    
    public function login($host = 'localhost:3306',$username='tien',$password='12345678',$database='commerceweb'){
        return mysqli_connect($host,$username,$password,$database);   
    }

    public function addUser($userRole,$userName,$password,$address,$email,$phone){
        $connect = $this->login();
        if ($connect->connect_error) {
            return false;
        }
        $sql = "INSERT INTO user (User_ID, User_Role, UserName, Password, Address, Mail, Phone)
        VALUES ('NULL','$userRole','$userName','$password','$address','$email',$phone)";
        $accept = $connect->query($sql);
        $connect->close();
        return $accept;
    }

    public function selectUser($table,...$field){
        $connect = $this->login();
        if ($connect->connect_error) {
            return NULL;
        }
        
        foreach($field as $element){
            $sql = "SELECT ".$element;
        }
        $sql .= " from ".$table;
        $result = $connect->query($sql);
        $object = new ArrayObject();
        while($row = $result->fetch_assoc()){
            $object->append($row);
        }
        $connect->close();
        return $object;
    }

}