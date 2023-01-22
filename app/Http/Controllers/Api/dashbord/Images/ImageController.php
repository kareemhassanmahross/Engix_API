<?php

namespace App\Http\Controllers\Api\dashbord\Images;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use App\http\Resources\ImageResource;
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
                'peoduct_id' => 'nullable',
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
            $filename = time() . '.' . $extention;
            $file->move('images/products/', $filename);
        }
        $imageCreate = Image::create([
            'image' => $filename,
            'product_id' => $req->product_id,
        ]);
        return response($imageCreate);
    }
    public function update(Request $req, $id)
    {
        $ProductImage = Validator::make(
            $req->all(),
            [
                'image' => 'required|mimes:png,jpg',
                'peoduct_id' => 'nullable',
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
        $imagess = $req->file("image");
        if ($imagess) {
            if ($name != null) {
                unlink(public_path("images/products/") . $name);
            }

            $image = $req->file("image");
            $name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("images/products/"), $name);
        }
        $imageCreate->update([
            'image' => $name,
            'product_id' => $req->product_id,
        ]);
        return response($imageCreate);
    }
    public function destroy($id)
    {
        $imageCreate = Image::findOrFail($id);
        $imageCreate->delete();
        if ($imageCreate->image) {
            unlink(public_path("images/products/") . $imageCreate->image);
        }
        return response($imageCreate);
    }
}