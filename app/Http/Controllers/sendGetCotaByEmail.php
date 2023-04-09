<?php

namespace App\Http\Controllers;

use App\Mail\getCota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class sendGetCotaByEmail extends Controller
{
    public function index(Request $req)
    {
        $reqcomplain = Validator::make(
            $req->all(),
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'massage' => 'required',
                'companyname' => 'required',
            ]
        );
        if ($reqcomplain->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $reqcomplain->errors()
            ], 401);
        }
        $data = [
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'massage' => $req->massage,
            'companyname' => $req->companyname,
        ];
        Mail::to('kareemdiap508@gmail.com')->send(new getCota($data));
        return response()->json([
            'status' => true,
            'Massage' => 'The email has been sent successfully'
        ], 200);
    }
}
