<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class LoginController extends Controller{

    //funtion này check login của 1 username
    public function getLogin(Request $request){
        $userName = $_POST['usernameLogin'];
        return view('home',compact('userName'));
    }

    //funtion này check login của 1 admin
    public function getAdminLogin(Request $request){
        $adminName = $_POST['adminLogin'];
        return view('adminpage',compact('adminName'));
    }
}
