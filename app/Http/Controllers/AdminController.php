<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller{
    public function removeAdmin(Request $request){
        $id = $request->get('id');
        $result = DB::table('admin')->where('Admin_ID','=',$id)->delete();
        return $result;
    }
    public function getAdmin(Request $request){
        $result = DB::table('admin')->select('Admin_ID','Admin_Name')->where('Admin_ID','<>',$_SESSION['idAdmin'])->get();
        return $result;
    }
}
