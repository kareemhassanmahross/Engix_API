<?php

namespace App\Http\Controllers\Api\dashbord\Images;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function index()
    {
        $imagesProduct = Image::get();
        return response($imagesProduct);
    }
    public function show($id)
    {
        $imagesProduct = Image::findOrFail($id);
        return response($imagesProduct);
    }

    public function create(Request $req)
    {
        $ProductImage = Validator::make(
            $req->all(),
            [
                'image' => 'required|mimes:png,jpg',
                'product_id' => 'nullable',
            ]
        );
        if ($ProductImage->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $ProductImage->errors()
            ], 401);
        }
        $image = $req->image;
        if ($image) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = "Image" .  time() . '.' . $extention;
            $path =  url('/images/products/' . $filename);
        }
        $imageCreate = Image::create([
            'image' => $path,
            'product_id' => $req->product_id,
        ]);
        $file->move('images/products/', $filename);
        return response()->json([
            'status' => true,
            'message' => 'Image Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $ProductImage = Validator::make(
            $req->all(),
            [
                'image' => 'required|mimes:png,jpg',
                'product_id' => 'nullable',
            ]
        );
        if ($ProductImage->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $ProductImage->errors()
            ], 401);
        }
        $imageCreate = Image::findOrFail($id);
        $name = $imageCreate->image;
        $nameImageUpdate = ltrim($name, url('/images/products'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/products/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("images/products/"), $nameOfNewImage);
            $path =  url('/images/products/' . $nameOfNewImage);
        }
        $imageCreate->update([
            'image' => $path,
            'product_id' => $req->product_id,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Image Update Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $imageDelete = Image::findOrFail($id);
        $imagePath =  $imageDelete->image;
        $nameImageUpdate = ltrim($imagePath, url('/images/products'));
        if ($nameImageUpdate) {
            unlink(public_path("images/products/") . $nameImageUpdate);
        }
        $imageDelete->delete();
        return response()->json([
            'status' => true,
            'message' => 'Image Deleted Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}