<?php

namespace App\Http\Controllers\Api\dashbord\categoryOurWork;

use App\Http\Controllers\Controller;
use App\Models\categoryOurWork;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class categoryOurWorkController extends Controller
{
    public function __construct()
    {
        if (Auth::guard('admins')->check()) {
            $this->middleware('auth:sanctum');
            $this->middleware('can:categoryOurWork');
        } else {
            // $this->middleware('auth:sanctum');
        }
    }
    public function index()
    {
        $categoryOurWork = categoryOurWork::with('OurWork')->get();
        if ($categoryOurWork->count() == 0) {
            return response()->json([
                'status' => true,
                'message' => 'Nothing Category Our Work Now',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response($categoryOurWork);
    }
    public function show($id)
    {
        $categoryOurWork = categoryOurWork::findOrFail($id);
        return response($categoryOurWork);
    }
    public function create(Request $req)
    {
        $validatecateoryOurWork = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
            ]
        );
        if ($validatecateoryOurWork->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validatecateoryOurWork->errors()
            ], 401);
        }
        $cateoryOurWork =  categoryOurWork::create([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Category Our Work Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $validatecateoryOurWork = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
            ]
        );
        if ($validatecateoryOurWork->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validatecateoryOurWork->errors()
            ], 401);
        }
        $cateoryOurWork = categoryOurWork::findOrFail($id);
        $cateoryOurWork->update([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Category Our Work Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $cateoryOurWork = categoryOurWork::findOrFail($id);
        $cateoryOurWork->delete();
        if ($cateoryOurWork) {
            return response()->json([
                'status' => true,
                'message' => 'Category Our Work Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Category Our Work not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}