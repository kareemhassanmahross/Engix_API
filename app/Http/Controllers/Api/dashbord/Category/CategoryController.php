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

        $validateCategory = Validator::make(
            $req->all(),
            [
                "categoryNameAr" => 'required',
                "categoryNameEn" => 'required',
                "subCategoryAr" => 'nullable',
                "subCategoryEn" => 'nullable',
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
            "subCategoryAr" => $req->subCategoryAr,
            "subCategoryEn" => $req->subCategoryEn,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Category Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {

        $validateCategory = Validator::make(
            $req->all(),
            [
                "categoryNameAr" => 'required',
                "categoryNameEn" => 'required',
                "subCategoryAr" => 'required',
                "subCategoryEn" => 'required',
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
            "subCategoryAr" => $req->subCategoryAr,
            "subCategoryEn" => $req->subCategoryEn,
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
                'message' => 'Product Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Product not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}