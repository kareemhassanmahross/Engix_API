<?php

namespace App\Http\Controllers\Api\dashbord;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return Admin
     */


    public function createUser(Request $request)
    {
        // dd($request);
        // $isAdmins = Auth::guard('admin')->isAdmin;
        // dd($isAdmins);
        try {
            // Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'nameAr' => 'required',
                    'nameEn' => 'required',
                    'email' => 'required|email|unique:admins,email',
                    'password' => 'required',
                    'isAdmin' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = Admin::create([
                'nameAr' => $request->nameAr,
                'nameEn' => $request->nameEn,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'isAdmin' => $request->isAdmin
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Admin Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return Admin
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (!Auth::guard('admin')->attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }
            $user = Admin::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'Admin Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}