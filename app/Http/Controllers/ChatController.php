<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    //
    public function sendMess(Request $request){
        $mess = $request->get('mess');
        DB::table('chat')->insert(
            ['User_ID'=>$_SESSION['idUser'],'Message'=>$mess]
        );
    }

    public function getMess(Request $request){
        // $mess = DB::table('chat')->where('User_ID','=',$_SESSION['idUser'])->get();
        $mess = DB::table('chat')->where('User_ID','=',$_SESSION['idUser'])->latest('Create_At')->limit(15)->get();
        $mess = json_decode($mess,true);
        if(count($mess) == 0) return;
        return $mess;
    }

    public function getMessForAdmin(Request $request){
        $question = DB::table('chat')->where('Status','=',0)->limit(1)->get();
        $question = json_decode($question,true);
        if(count($question) == 0) return ;
        $mess = DB::table('chat')->where('User_ID','=',$question[0]['User_ID'])->latest('Create_At')->limit(15)->get();
        return $mess;
    }

    public function adminSendMess(Request $request){
        $mess = $request->get('mess');
        $chatID = $request->get('chatID');
        $userID = $request->get('userID');
        DB::table('chat')->where('User_ID','=',$userID)->where('Chat_ID','<=',$chatID)->where('Status','=','0')->update(
            ['Status'=>1]
        );
        DB::table('chat')->insert(
            ['User_ID'=>$userID,'Message'=>$mess,'Status'=>2]
        );
    }
}
