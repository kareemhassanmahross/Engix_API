<?php

namespace App\Http\Controllers\Api\dashbord\aboutus;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::get();
        if ($aboutUs->count() == 0) {
            return response()->json([
                'status' => true,
                'message' => 'Nothing About Us Now !',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response($aboutUs);
    }
    public function show($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return response($aboutUs);
    }
    public function create(Request $req)
    {
        try {
            $validateAboutUs = Validator::make(
                $req->all(),
                [
                    'image' => 'required|mimes:png,jpg',
                    'whoWeAreAr' => 'required',
                    'whoWeAreEn' => 'required',
                    'ourVisionAr' => 'required',
                    'ourVisionEn' => 'required',
                    'ourMissionAr' => 'required',
                    'ourMissionEn' => 'required',
                ]
            );
            if ($validateAboutUs->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateAboutUs->errors()
                ], 401);
            }
            $image = $req->image;
            if ($image) {
                $file = $req->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = "Image" .  time() . '.' . $extention;
                $path =  url('/images/AboutUs/' . $filename);
            }
            $AboutUs = AboutUs::create([
                'image' =>  $path,
                'whoWeAreAr' => $req->whoWeAreAr,
                'whoWeAreEn' => $req->whoWeAreEn,
                'ourVisionAr' => $req->ourVisionAr,
                'ourVisionEn' => $req->ourVisionEn,
                'ourMissionAr' => $req->ourMissionAr,
                'ourMissionEn' => $req->ourMissionEn,
            ]);
            $image->move(public_path("images/AboutUs/"), $filename);
            return response()->json([
                'status' => true,
                'message' => 'About Us Created Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 500);
        }
    }
    public function update(Request $req, $id)
    {
        $validateAboutUs = Validator::make(
            $req->all(),
            [
                'image' => 'required|mimes:png,jpg',
                'whoWeAreAr' => 'required',
                'whoWeAreEn' => 'required',
                'ourVisionAr' => 'required',
                'ourVisionEn' => 'required',
                'ourMissionAr' => 'required',
                'ourMissionEn' => 'required',
            ]
        );
        if ($validateAboutUs->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateAboutUs->errors()
            ], 401);
        }
        $newdataUpdate = AboutUs::findOrFail($id);
        $name = $newdataUpdate->image;
        $nameImageUpdate = ltrim($name, url('/images/AboutUs'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/AboutUs/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("images/AboutUs/"), $nameOfNewImage);
            $path =  url('/images/AboutUs/' . $nameOfNewImage);
        }
        $newdataUpdate->update([
            'image' =>  $path,
            'whoWeAreAr' => $req->whoWeAreAr,
            'whoWeAreEn' => $req->whoWeAreEn,
            'ourVisionAr' => $req->ourVisionAr,
            'ourVisionEn' => $req->ourVisionEn,
            'ourMissionAr' => $req->ourMissionAr,
            'ourMissionEn' => $req->ourMissionEn,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'About Us Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $AboutUsDelete = AboutUs::findOrFail($id);
        $imagePath =  $AboutUsDelete->image;
        $nameImageDelete = ltrim($imagePath, url('/images/AboutUs'));
        if ($nameImageDelete) {
            unlink(public_path("images/AboutUs/") . $nameImageDelete);
        }
        $AboutUsDelete->delete();
        return response()->json([
            'status' => true,
            'message' => 'About Us Deleted Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}