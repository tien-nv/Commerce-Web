<?php

namespace App\Http\Controllers;

use App\models\ProductProcess;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function verifyEmail(Request $request)
    {
        $token = $request->get('token');
        $user = DB::table('user_not_active')->where('Actived', '=', 0)->get();
        $user = json_decode($user, true);
        if (count($user) > 0) {
            for ($i = 0; $i < count($user); $i++) {
                if (strcmp($token, $user[$i]['Code']) == 0) {
                    DB::table('user_not_active')->where('Code', 'like', $token)->update(['Actived' => 1]);
                    DB::table('user')->insert(
                        [
                            'User_ID' => $user[$i]['User_ID'],
                            'UserName' => $user[$i]['UserName'],
                            'Password' => $user[$i]['Password'],
                            'Address' => $user[$i]['Address'],
                            'Mail' => $user[$i]['Mail'],
                            'Phone' => $user[$i]['Phone'],
                            'Gender' => $user[$i]['Gender'],
                            'Birth' => $user[$i]['Birth'],
                        ]
                    );
                    $products = ProductProcess::getProductByType('all');
                    return view('home', compact('products'));
                }
            }
        } else {
            $products = ProductProcess::getProductByType('all');
            return view('home', compact('products'));
        }
    }
}
