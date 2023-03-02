<?php

namespace App\Http\Controllers\Api\dashbord\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        if (Auth::guard('admins')->check()) {
            $this->middleware('auth:sanctum');
            $this->middleware('can:categories');
        } else {
            // $this->middleware('auth:sanctum');
        }
    }
    public function index()
    {
        $categories = Category::with('subCategory')->get();
        return response($categories);
    }
    public function show($id)
    {
        $category = Category::with('subCategory')->findOrFail($id);
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
                "desctriptionEn" => 'required',
                "prand" => 'required',
                'image' => 'required|mimes:png,jpg',
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
            $path =  url('/images/category/' . $filename);
        }
        $category =  Category::create([
            "categoryNameAr" => $req->categoryNameAr,
            "categoryNameEn" => $req->categoryNameEn,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
            'prand' => $req->prand,
            'image' => $path,
        ]);
        $file->move('images/category/', $filename);
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
                "desctriptionAr" => 'required',
                "desctriptionEn" => 'required',
                "prand" => 'required',
                'image' => 'required|mimes:png,jpg',
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
        $name = $category->image;
        $nameImageUpdate = ltrim($name, url('/images/category'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/category/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $path =  url('/images/category/' . $nameOfNewImage);
        }
        $category->update([
            "categoryNameAr" => $req->categoryNameAr,
            "categoryNameEn" => $req->categoryNameEn,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
            "prand" => $req->prand,
            'image' => $path,
        ]);
        $image->move(public_path("images/category/"), $nameOfNewImage);
        return response()->json([
            'status' => true,
            'message' => 'Category Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $imagePath =  $category->image;
        $nameImageDelete = ltrim($imagePath, url('/images/category'));
        if ($nameImageDelete) {
            unlink(public_path("images/category/") . $nameImageDelete);
        }
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