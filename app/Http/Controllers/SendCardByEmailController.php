<?php

namespace App\Http\Controllers;

use App\Mail\SendemailAdmin;
use App\Mail\SendemailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendCardByEmailController extends Controller
{
    public function SendEmailOrder(Request $req)
    {
        $info = $req->info;
        $info2 = $req->info2;
        // $info = [
        //     'name' => 'kareem',
        //     'email' => 'user1@user.com',
        //     'address' => 'lorem lorem lorem lorem lorem lorem',
        //     'phone' => '01000260660'
        // ];
        // $info2 = [
        //     [
        //         'commition' => '10',
        //         'name' => 'product1',
        //         'qty' => '1',
        //         'price' => '10'

        //     ],
        //     [
        //         'commition' => '10',
        //         'name' => 'product2',
        //         'qty' => '2',
        //         'price' => '15'

        //     ],
        //     [
        //         'commition' => '10',
        //         'name' => 'product3',
        //         'qty' => '3',
        //         'price' => '25'
        //     ],
        // ];
        $arra1 = collect($info2)
            ->reduce(function ($carry, $item) {
                $totalSum = $item['price'] * $item['qty'];
                $sumtotalPrice = $carry + $totalSum;
                return $sumtotalPrice;
            }, 0);
        $arra2 = collect($info2)
            ->reduce(function ($carry, $item) {
                $totalSum =  $item['qty'] * $item['commition'];
                $sumPrice = $carry + $totalSum;
                return $sumPrice;
            }, 0);
        $arra = [
            'totalPrice' => $arra1,
            'totalCommition' => $arra2
        ];
        $inf_arr = [];
        foreach ($info as $x => $x_value) {
            if ($x == 'email') {
                array_push($inf_arr, $x_value);
            }
        }
        Mail::to($inf_arr[0])->send(new SendemailUser($info, $info2, $arra));
        Mail::to('kareemdiap508@gmail.com')->send(new SendemailAdmin($info, $info2, $arra));

        return response()->json([
            'status' => true,
            'massage' => 'Successfully'
        ], 200);
    }
}
