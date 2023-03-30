<?php

namespace App\Http\Controllers;

use App\Mail\resetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SendEmailResetPasswordController extends Controller
{
    public function resetPasswordEmail(Request $req)
    {
        try {
            $validateUser = Validator::make(
                $req->all(),
                [
                    'email' => 'required|email|exists:users,email',
                ]
            );
            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $user  = User::select('id')->where('email', $req->email)->get();
            if ($user->count() != 1) {
                return response()->json([
                    'status' => false,
                    'Massage' => 'You E-mail not Existing'
                ], 401);
            }
            $email = $req->email;
            $arra = [];
            foreach ($user as $u) {
                array_push($arra, $u['id']);
            }
            $id = $arra[0];
            // dd($email);
            Mail::to($email)->send(new resetPassword($id));
            return response()->json([
                'status' => true,
                'Massage' => 'We have sent an email'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    // public function reset($id)
    // {
    //     $emailUser = User::select('email')->where('id', $id)->get();
    //     return view('resetPassword', ['email' => $emailUser]);
    // }
    // public function updatapassword()
    // {
    //     dd('kareem');
    //     // $validateUserpassword = Validator::make(
    //     //     $req->all(),
    //     //     [
    //     //         'email' => 'required|email|exists:users,email',
    //     //         'password' => 'min:6|required',
    //     //         'password_confirmation' => 'required|same:password|min:6'
    //     //     ]
    //     // );

    //     // if ($validateUserpassword->fails()) {
    //     //     return response()->json([
    //     //         'status' => false,
    //     //         'message' => 'validation error',
    //     //         'errors' => $validateUserpassword->errors()
    //     //     ], 401);
    //     // }

    //     // $user = User::firstWhere('email', $req->email);

    //     // $user->update([
    //     //     'password' => Hash::make($req->password),
    //     // ]);

    //     // return response()->json([
    //     //     'status' => true,
    //     //     'Massage' => 'Your password updated successfully',
    //     // ]);
    // }
    public function update(Request $req)
    {
        $validateUserpassword = Validator::make(
            $req->all(),
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'min:6|required',
                'password_confirmation' => 'required|same:password|min:6'
            ]
        );

        if ($validateUserpassword->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUserpassword->errors()
            ], 401);
        }

        $user = User::firstWhere('email', $req->email);

        $user->update([
            'password' => Hash::make($req->password),
        ]);

        return response()->json([
            'status' => true,
            'Massage' => 'Your password updated successfully',
        ]);
    }
}
