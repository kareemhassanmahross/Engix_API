<?php

namespace App\Http\Controllers\Api\dashbord\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('product')->get();
        return response($categories);
    }
    public function show($id)
    {
        $category = Category::with('product')->findOrFail($id);
        return response($category);
    }
    public function create(Request $req)
    {
        $cate =  Category::create([
            "categoryName_ar" => $req->categoryName_ar,
            "categoryName_en" => $req->categoryName_en,
            "subCategory_ar" => $req->subCategory_ar,
            "subCategory_en" => $req->subCategory_en,
        ]);
        return response($cate);
    }
    public function update(Request $req, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            "categoryName_ar" => $req->categoryName_ar,
            "categoryName_en" => $req->categoryName_en,
            "subCategory_ar" => $req->subCategory_ar,
            "subCategory_en" => $req->subCategory_en,
        ]);
        return response($category);
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response($category);
    }
}