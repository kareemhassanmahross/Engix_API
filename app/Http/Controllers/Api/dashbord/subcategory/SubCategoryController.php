<?php

namespace App\Http\Controllers\Api\dashbord\subcategory;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SubCategoryController extends Controller
{
    public function __construct()
    {
        if (Auth::guard('admins')->check()) {
            $this->middleware('auth:sanctum');
            $this->middleware('can:subcats');
        } else {
            // $this->middleware('auth:sanctum');
        }
    }
    public function index()
    {
        $categories = SubCategory::with('product')->get();
        return response($categories);
    }
    public function show($id)
    {
        $category = SubCategory::findOrFail($id);
        return response($category);
    }
    public function create(Request $req)
    {
        // dd('kareem');
        $validateCategory = Validator::make(
            $req->all(),
            [
                "subCategoryAr" => 'required',
                "subCategoryEn" => 'required',
                "desctriptionAr" => 'required',
                "desctriptionEn" => 'required',
                'image' => 'required|mimes:png,jpg',
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
        $image = $req->image;
        if ($image) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = "Image" .  time() . '.' . $extention;
            $path =  url('/images/subcategory/' . $filename);
        }
        $category =  SubCategory::create([
            "subCategoryEn" => $req->subCategoryEn,
            "subCategoryAr" => $req->subCategoryAr,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
            'image' => $path,
            "category_id" => $req->category_id,
        ]);
        $file->move('images/subcategory/', $filename);
        return response()->json([
            'status' => true,
            'message' => 'Sub Category Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $validateCategory = Validator::make(
            $req->all(),
            [
                "subCategoryAr" => 'required',
                "subCategoryEn" => 'required',
                "desctriptionAr" => 'required',
                "desctriptionEn" => 'required',
                'image' => 'required|mimes:png,jpg',
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
        $name = $category->image;
        $nameImageUpdate = ltrim($name, url('/images/subcategory'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/subcategory/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $path =  url('/images/subcategory/' . $nameOfNewImage);
        }
        $category->update([
            "subCategoryEn" => $req->subCategoryEn,
            "subCategoryAr" => $req->subCategoryAr,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
            'image' => $path,
            "category_id" => $req->category_id,
        ]);
        $image->move(public_path("images/subcategory/"), $nameOfNewImage);
        return response()->json([
            'status' => true,
            'message' => 'Sub Category Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $category = SubCategory::findOrFail($id);
        $imagePath =  $category->image;
        $nameImageDelete = ltrim($imagePath, url('/images/subcategory'));
        if ($nameImageDelete) {
            unlink(public_path("images/subcategory/") . $nameImageDelete);
        }
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