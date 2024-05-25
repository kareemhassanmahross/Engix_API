<?php

namespace App\Http\Controllers\Api\dashbord;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return Admin
     */


    public function createUser(Request $request)
    {
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
                'message' => 'Admin Created' . $request->email . 'Successfully',
                'token' => $user->createToken("API TOKEN_Register_Admin " . $request->email)->plainTextToken
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
                    'email' => 'required|exists:admins',
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
            // dd(Auth::guard('admins')->attempt($request->only(['email', 'password'])));
            if (!Auth::guard('admins')) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }
            $user = Admin::where('email', $request->email)->first();
            if ($user || Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Admin Logged In Successfully',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function logoutUser(Request $req)
    {
        $req->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            'message' => 'logged out successfully',
        ], 200);
    }
}