<?php

namespace App\Http\Controllers\Api\dashbord\subcategory;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = SubCategory::get();
        return response($categories);
    }
    public function show($id)
    {
        $category = SubCategory::findOrFail($id);
        return response($category);
    }
    public function create(Request $req)
    {

        $validateCategory = Validator::make(
            $req->all(),
            [
                "subCategoryAr" => 'required',
                "subCategoryEn" => 'required',
                "desctriptionAr" => 'required',
                "desctriptionEn" => 'required',
                "category_id" => 'nullable'
            ]
        );
        if ($validateCategory->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateCategory->errors()
            ], 401);
        }
        $category =  SubCategory::create([
            "subCategoryEn" => $req->subCategoryEn,
            "subCategoryAr" => $req->subCategoryAr,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
            "category_id" => $req->category_id,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Sub Category Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        // dd('karem');
        $validateCategory = Validator::make(
            $req->all(),
            [
                "subCategoryAr" => 'required',
                "subCategoryEn" => 'required',
                "desctriptionAr" => 'required',
                "desctriptionEn" => 'required',
                "category_id" => 'nullable'
            ]
        );
        if ($validateCategory->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateCategory->errors()
            ], 401);
        }
        $category = SubCategory::findOrFail($id);
        $category->update([
            "subCategoryEn" => $req->subCategoryEn,
            "subCategoryAr" => $req->subCategoryAr,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
            "category_id" => $req->category_id,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Sub Category Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $category = SubCategory::findOrFail($id);
        $category->delete();
        if ($category) {
            return response()->json([
                'status' => true,
                'message' => 'Sub Category Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Sub Category not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}
