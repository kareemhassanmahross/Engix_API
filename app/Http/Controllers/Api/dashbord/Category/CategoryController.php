<?php

namespace App\Http\Controllers\Api\dashbord\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return response($categories);
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response($category);
    }
    public function create(Request $req)
    {
        // dd($req);
        $validateCategory = Validator::make(
            $req->all(),
            [
                "categoryNameAr" => 'required',
                "categoryNameEn" => 'required',
                "desctriptionAr" => 'required',
                "desctriptionEn" => 'required'
            ]
        );
        if ($validateCategory->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateCategory->errors()
            ], 401);
        }
        $category =  Category::create([
            "categoryNameAr" => $req->categoryNameAr,
            "categoryNameEn" => $req->categoryNameEn,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Category Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        // dd('karem');
        $validateCategory = Validator::make(
            $req->all(),
            [
                "categoryNameAr" => 'required',
                "categoryNameEn" => 'required',
                "desctriptionAr" => 'required',
                "desctriptionEn" => 'required'
            ]
        );
        if ($validateCategory->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateCategory->errors()
            ], 401);
        }
        $category = Category::findOrFail($id);
        $category->update([
            "categoryNameAr" => $req->categoryNameAr,
            "categoryNameEn" => $req->categoryNameEn,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Category Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        if ($category) {
            return response()->json([
                'status' => true,
                'message' => 'Category Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Category not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}