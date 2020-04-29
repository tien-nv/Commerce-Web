<?php

namespace App\models;

use ArrayObject;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Model;

class ProductProcess extends Model
{
    public function selectProduct($table,...$field){
        $query = new QueryDB();
        //select từ các bảng gộp lại thành 1 object
        //select từ phone...
    }
}