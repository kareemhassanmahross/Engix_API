<?php

namespace App\Http\Controllers;

use App\Mail\complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class sendComplainByEmail extends Controller
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
                'subject' => 'required',
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
            'subject' => $req->subject,
        ];
        Mail::to('kareemdiap508@gmail.com')->send(new complain($data));
        return response()->json([
            'status' => true,
            'Massage' => 'The email has been sent successfully'
        ], 200);
    }
}