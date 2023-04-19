<?php

namespace App\Http\Controllers\Api\dashbord;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthUserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return response($users);
    }
    public function createUser(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'age' => 'required',
                    'country' => 'required',
                    'methodToPay' => 'required',
                    'password' => 'required',
                    'phone' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                "age" => $request->age,
                'country' => $request->country,
                'phone' => $request->phone,
                "methodToPay" => $request->methodToPay,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Acouunt ' . $user->email . ' Created Successfully',
                'token' => $user->createToken("API TOKEN_Register_User " . $request->email)->plainTextToken
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
            if (!Auth::guard('users')) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }
            $user = User::where('email', $request->email)->first();
            if ($user || Hash::check($request->password, $user->password)) {
                return response()->json([
                    'user' => [
                        'name' => $user->name,
                        'email' => $user->email,
                        'phone' => $user->phone
                    ],
                    'status' => true,
                    'message' => 'User Logged In Successfully',
                    'token' => $user->createToken("User API TOKEN " . $request->email)->plainTextToken
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