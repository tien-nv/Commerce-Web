<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AdminProcess extends Model
{
    ////
    public function addProduct($data){
        $test = array("xin choa","bye",$data);
        return $test;
    }
}
