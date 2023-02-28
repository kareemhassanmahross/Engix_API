<?php

namespace App\Http\Controllers\Api\dashbord\OurWork;

use App\Http\Controllers\Controller;
use App\Models\OurWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OurWorkController extends Controller
{
    public function index()
    {
        $OurWork = OurWork::with('categoryOurWork')->get();
        if ($OurWork->count() == 0) {
            return response()->json([
                'status' => true,
                'massage' => 'Nothing Our Works Now !',
            ], 401);
        }
        return response($OurWork);
    }
    public function show($id)
    {
        $OurWork = OurWork::where('id', $id)->with('categoryOurWork')->get();
        if ($OurWork->count() == 0) {
            return response()->json([
                'status' => true,
                'massage' => 'Nothing Our Works Now !',
            ], 401);
        }
        return response($OurWork);
    }
    public function create(Request $req)
    {
        $validateOurWork = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
                "image" => 'required|mimes:png,jpg',
                "category_our_work_id" => 'required|exists:category_our_works,id'
            ]
        );
        if ($validateOurWork->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateOurWork->errors()
            ], 401);
        }
        $image = $req->image;
        if ($image) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = "Image" .  time() . '.' . $extention;
            $path =  url('/images/OurWork/' . $filename);
        }
        $OurClient = OurWork::create([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
            "image" => $path,
            "category_our_work_id" => $req->category_our_work_id,
        ]);
        $file->move('images/OurWork/', $filename);
        return response()->json([
            'status' => true,
            'message' => 'Our Work Create Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $validateOurWork = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
                "image" => 'required|mimes:png,jpg',
                "category_our_work_id" => 'required|exists:category_our_works,id'
            ]
        );
        if ($validateOurWork->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateOurWork->errors()
            ], 401);
        }
        $OurWorkimage = OurWork::findOrFail($id);
        $name = $OurWorkimage->image;
        $nameImageUpdate = ltrim($name, url('images/OurWork'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/OurWork/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("images/OurWork/"), $nameOfNewImage);
            $path =  url('images/OurWork/' . $nameOfNewImage);
        }
        $OurWorkimage->update([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
            "image" => $path,
            "category_our_work_id" => $req->category_our_work_id,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Our Work Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $OurClientDelete = OurWork::findOrFail($id);
        $imagePath =  $OurClientDelete->image;
        $nameImageUpdate = ltrim($imagePath, url('/images/OurWork'));
        if ($nameImageUpdate) {
            unlink(public_path("images/OurWork/") . $nameImageUpdate);
        }
        $OurClientDelete->delete();
        return response()->json([
            'status' => true,
            'message' => 'Our Work Deleted Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}