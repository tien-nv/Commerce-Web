<?php

namespace App\models;

use ArrayObject;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Model;

class ProductProcess extends Model
{

    //function add sản phẩm từ phía admin
    public static function addProduct($data){
        $test = array("xin choa","bye",$data);
        return $test;
    }

    public static function selectProduct($table,...$field){
        $query = new QueryDB();
        //select sản phẩm 15 sản phẩm 1
        $object = $query->select($table,$field);
    }
}