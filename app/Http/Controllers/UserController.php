<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function userDescription()
    {
        $result = DB::table('user')->select('UserName', 'Address', 'Mail', 'Phone', 'Gender', 'Birth')->where('User_ID', '=', $_SESSION['idUser'])->get();
        return $result;
    }
    public function changePassword(Request $request)
    {
        $oldPass = $request->get('old');
        $newPass = $request->get('new');
        $newPass_encry = encrypt($newPass);
        $newPass = hash('ripemd160', $newPass);
        $oldPass = hash('ripemd160', $oldPass);
        $result = DB::table('user')->select('Password')->where('User_ID', '=', $_SESSION['idUser'])->get();
        $result = json_decode($result, true);
        if ($oldPass !== $result[0]['Password']) return -1;
        DB::table('user')->where('User_ID', '=', $_SESSION['idUser'])->update(['Password' => $newPass]);
        DB::table('user_not_active')->where('User_ID', '=', $_SESSION['idUser'])->update(['Password' => $newPass]);
        $_SESSION['password_cw'] = $newPass;
        setcookie('password_cw', $newPass_encry, time() + (86400 * 30)); //1 day
        return 1;
    }
}
