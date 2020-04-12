<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class LoginController extends Controller{
    public function getRequest(Request $request){
        return $request->all();
    }
    public function getLogin(Request $request){
        $userName = $_POST['usernameLogin'];
        return view('homeUser',compact('userName'));
    }
}
