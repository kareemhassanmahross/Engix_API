<?php

namespace App\Http\Controllers\Api\dashbord\CategoryProgram;

use App\Http\Controllers\Controller;
use App\Models\CategoryProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryProgramController extends Controller
{
    public function __construct()
    {
        if (Auth::guard('admins')->check()) {
            // $this->middleware('auth:sanctum');
            // $this->middleware('can:categories');
        } else {
            // $this->middleware('auth:sanctum');
        }
    }
    public function index()
    {
        $categoryPrograms = CategoryProgram::with('program')->get();
        if ($categoryPrograms->count() == 0) {
            return response()->json([
                'status' => true,
                'Massage' => 'Nothing Category Programs Now !',
            ], 401);
        }
        return response($categoryPrograms);
    }
    public function show($id)
    {
        $categoryPrograms = CategoryProgram::with('program')
            ->where('id', $id)->get();
        if ($categoryPrograms->count() == 0) {
            return response()->json([
                'status' => true,
                'Massage' => 'Nothing Category Programs Now !',
            ], 401);
        }
        return response($categoryPrograms);
    }
    public function create(Request $req)
    {
        $validateCategoryProgram = Validator::make(
            $req->all(),
            [
                "categoryNameAr" => 'required',
                "categoryNameEn" => 'required',
                "desctriptionAr" => 'required',
                "desctriptionEn" => 'required',
                'image' => 'required|mimes:png,jpg',
            ]
        );
        if ($validateCategoryProgram->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateCategoryProgram->errors()
            ], 401);
        }
        $image = $req->image;
        if ($image) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = "Image" .  time() . '.' . $extention;
            $path =  url('/images/categoryPrograms/' . $filename);
        }
        $CategoryProgram = CategoryProgram::create([
            "categoryNameAr" => $req->categoryNameAr,
            "categoryNameEn" => $req->categoryNameEn,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
            'image' => $path,
        ]);
        $file->move('images/categoryPrograms/', $filename);
        return response()->json([
            'status' => true,
            'message' => 'Category Programs Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $validateCategoryProgram = Validator::make(
            $req->all(),
            [
                "categoryNameAr" => 'required',
                "categoryNameEn" => 'required',
                "desctriptionAr" => 'required',
                "desctriptionEn" => 'required',
                'image' => 'required|mimes:png,jpg',
            ]
        );
        if ($validateCategoryProgram->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateCategoryProgram->errors()
            ], 401);
        }
        $categoryprogram = CategoryProgram::findOrFail($id);
        $name = $categoryprogram->image;
        $nameImageUpdate = ltrim($name, url('/images/categoryPrograms'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/categoryPrograms/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $path =  url('/images/categoryPrograms/' . $nameOfNewImage);
        }
        $categoryprogram->update([
            "categoryNameAr" => $req->categoryNameAr,
            "categoryNameEn" => $req->categoryNameEn,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
            'image' => $path,
        ]);
        $image->move(public_path("images/categoryPrograms/"), $nameOfNewImage);
        return response()->json([
            'status' => true,
            'message' => 'Category Programs Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $CategoryProgram = CategoryProgram::findOrFail($id);
        $imagePath =  $CategoryProgram->image;
        $nameImageDelete = ltrim($imagePath, url('/images/categoryPrograms'));
        if ($nameImageDelete) {
            unlink(public_path("images/categoryPrograms/") . $nameImageDelete);
        }
        $CategoryProgram->delete();
        if ($CategoryProgram) {
            return response()->json([
                'status' => true,
                'message' => 'Category Program Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Category Program not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}
