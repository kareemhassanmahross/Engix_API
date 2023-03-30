<?php

namespace App\Http\Controllers;

use App\Mail\SendemailAdmin;
use App\Mail\SendemailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendCardByEmailController extends Controller
{
    public function SendEmail(Request $req)
    {
        $info = $req->info;
        $info2 = $req->cart;
        $inf_arr = [];
        foreach ($info as $x => $x_value) {
            if ($x == 'email') {
                array_push($inf_arr, $x_value);
            }
        }
        Mail::to($inf_arr[0])->send(new SendemailUser($info, $info2));
        Mail::to('kareemdiap508@gmail.com')->send(new SendemailAdmin($info, $info2));

        return response()->json([
            'status' => true,
            'massage' => 'Successfully'
        ], 200);
    }
}