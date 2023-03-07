<?php

namespace App\Http\Controllers\Api\dashbord\SubCategoryProgram;

use App\Http\Controllers\Controller;
use App\Models\SubCategoryProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryProgramController extends Controller
{
    public function index()
    {
        $SubCategoryProgram = SubCategoryProgram::with('catagoryProgram')->with('program')->get();
        if ($SubCategoryProgram->count() == 0) {
            return response()->json([
                'status' => true,
                'Massage' => 'Nothing Sub Category Program Programs Now !',
            ], 401);
        }
        return response($SubCategoryProgram);
    }
    public function show($id)
    {
        $SubCategoryProgram = SubCategoryProgram::with('catagoryProgram')->with('program')
            ->where('id', $id)->get();
        if ($SubCategoryProgram->count() == 0) {
            return response()->json([
                'status' => true,
                'Massage' => 'Nothing Sub Category Program Programs Now !',
            ], 401);
        }
        return response($SubCategoryProgram);
    }
    public function create(Request $req)
    {
        $validateSubCategoryProgram = Validator::make(
            $req->all(),
            [
                "subCategoryAr" => 'required',
                "subCategoryEn" => 'required',
                "desctriptionAr" => 'required',
                "desctriptionEn" => 'required',
                'image' => 'required|mimes:png,jpg',
                'category_program_id' => 'nullable'
            ]
        );
        if ($validateSubCategoryProgram->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateSubCategoryProgram->errors()
            ], 401);
        }
        $image = $req->image;
        if ($image) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = "Image" .  time() . '.' . $extention;
            $path =  url('/images/SubCategoryProgram/' . $filename);
        }
        SubCategoryProgram::create([
            "subCategoryAr" => $req->subCategoryAr,
            "subCategoryEn" => $req->subCategoryEn,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
            'image' => $path,
            'category_program_id' => $req->category_program_id
        ]);
        $file->move('images/SubCategoryProgram/', $filename);
        return response()->json([
            'status' => true,
            'message' => 'Sub Category Program Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $validateSubCategoryProgram = Validator::make(
            $req->all(),
            [
                "subCategoryAr" => 'required',
                "subCategoryEn" => 'required',
                "desctriptionAr" => 'required',
                "desctriptionEn" => 'required',
                'image' => 'required|mimes:png,jpg',
                'category_program_id' => 'nullable'
            ]
        );
        if ($validateSubCategoryProgram->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateSubCategoryProgram->errors()
            ], 401);
        }
        $SubCategoryProgram = SubCategoryProgram::findOrFail($id);
        $name = $SubCategoryProgram->image;
        $nameImageUpdate = ltrim($name, url('/images/SubCategoryProgram'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/SubCategoryProgram/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $path =  url('/images/SubCategoryProgram/' . $nameOfNewImage);
        }
        $SubCategoryProgram->update([
            "subCategoryAr" => $req->subCategoryAr,
            "subCategoryEn" => $req->subCategoryEn,
            "desctriptionAr" => $req->desctriptionAr,
            "desctriptionEn" => $req->desctriptionEn,
            'image' => $path,
            'category_program_id' => $req->category_program_id
        ]);
        $image->move(public_path("images/SubCategoryProgram/"), $nameOfNewImage);
        return response()->json([
            'status' => true,
            'message' => 'Sub Category Program Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $SubCategoryProgram = SubCategoryProgram::findOrFail($id);
        $imagePath =  $SubCategoryProgram->image;
        $nameImageDelete = ltrim($imagePath, url('/images/SubCategoryProgram'));
        if ($nameImageDelete) {
            unlink(public_path("images/SubCategoryProgram/") . $nameImageDelete);
        }
        $SubCategoryProgram->delete();
        if ($SubCategoryProgram) {
            return response()->json([
                'status' => true,
                'message' => 'Sub Category Program Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Sub Category Program not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}