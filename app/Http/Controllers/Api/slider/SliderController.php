<?php

namespace App\Http\Controllers\Api\slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        // dd('kareem');
        $sliderImage = Slider::get();
        return response($sliderImage);
    }
    public function show($id)
    {
        $sliderImage = Slider::findOrFail($id);
        return response($sliderImage);
    }
    public function create(Request $req)
    {
        $sliderImage = Validator::make(
            $req->all(),
            [
                'image' => 'required|mimes:png,jpg',
            ]
        );
        if ($sliderImage->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $sliderImage->errors()
            ], 401);
        }
        $image = $req->image;
        if ($image) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = "Image" .  time() . '.' . $extention;
            $path =  url('/images/slider/' . $filename);
            $file->move('images/slider/', $filename);
        }
        $imageCreate = Slider::create([
            'image' => $path,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Image Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $sliderImage = Validator::make(
            $req->all(),
            [
                'image' => 'required|mimes:png,jpg',
            ]
        );
        if ($sliderImage->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $sliderImage->errors()
            ], 401);
        }
        $imageCreate = Slider::findOrFail($id);
        $name = $imageCreate->image;
        $nameImageUpdate = ltrim($name, url('/images/slider'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/slider/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("images/slider/"), $nameOfNewImage);
            $path =  url('/images/slider/' . $nameOfNewImage);
        }
        $imageCreate->update([
            'image' => $path,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Image Update Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $imageCreate = Slider::findOrFail($id);
        $imagePath =  $imageCreate->image;
        $nameImageUpdate = ltrim($imagePath, url('/images/slider'));
        if ($nameImageUpdate) {
            unlink(public_path("/images/slider/") . $nameImageUpdate);
        }
        $imageCreate->delete();
        return response()->json([
            'status' => true,
            'message' => 'Image Deleted Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}