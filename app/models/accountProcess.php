<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\QueryDB;

class accountProcess extends Model
{
    //
    //
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

    public function checkAdminLogin(){
        
    }
}
