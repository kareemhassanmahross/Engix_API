<?php

namespace App\Http\Controllers\Api\dashbord\socialmedia;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        if (Auth::guard('admins')->check()) {
            $this->middleware('auth:sanctum');
            $this->middleware('can:socialmedia');
        } else {
            // $this->middleware('auth:sanctum');
        }
    }
    public function index()
    {
        $SocialMedia = SocialMedia::get();
        if ($SocialMedia->count() == 0) {
            return response()->json([
                'status' => true,
                'message' => 'Nothing Social Media Links Now !',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response($SocialMedia);
    }
    public function show($id)
    {
        $SocialMedia = SocialMedia::findOrFail($id);
        return response($SocialMedia);
    }
    public function create(Request $req)
    {
        try {
            $SocialMedia = Validator::make(
                $req->all(),
                [
                    'facebook' => 'required',
                    'instgram' => 'required',
                    'youtupe' => 'required',
                    'linkedin' => 'required',
                ]
            );
            if ($SocialMedia->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $SocialMedia->errors()
                ], 401);
            }
            $SocialMedia = SocialMedia::create([
                'facebook' => $req->facebook,
                'instgram' => $req->instgram,
                'youtupe' => $req->youtupe,
                'linkedin' => $req->linkedin,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Social Media Created Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 500);
        }
    }
    public function update(Request $req, $id)
    {
        $validateSocialMedia = Validator::make(
            $req->all(),
            [
                'facebook' => 'required',
                'instgram' => 'required',
                'youtupe' => 'required',
                'linkedin' => 'required',
            ]
        );
        if ($validateSocialMedia->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateSocialMedia->errors()
            ], 401);
        }
        $SocialMedia = SocialMedia::findOrFail($id);
        $SocialMedia->update([
            'facebook' => $req->facebook,
            'instgram' => $req->instgram,
            'youtupe' => $req->youtupe,
            'linkedin' => $req->linkedin,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Social Media Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $SocialMedia = SocialMedia::findOrFail($id);
        $SocialMedia->delete();
        if ($SocialMedia) {
            return response()->json([
                'status' => true,
                'message' => 'Social Media Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Social Media not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}