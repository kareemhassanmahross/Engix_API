<?php

namespace App\Http\Controllers\Api\dashbord\OurClient;

use App\Http\Controllers\Controller;
use App\Models\OurClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OurClientController extends Controller
{
    public function index()
    {
        $ourClients = OurClient::get();
        if ($ourClients->count() == 0) {
            return response()->json([
                'status' => true,
                'message' => 'nothing Our Clients now',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response($ourClients);
    }
    public function show($id)
    {
        $ourClient = OurClient::findOrFail($id);
        return response($ourClient);
    }
    public function create(Request $req)
    {
        $validateOurClient = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
                "image" => 'required|mimes:png,jpg',
                "category_our_work_id" => 'required|exists:category_our_works,id'
            ]
        );
        if ($validateOurClient->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateOurClient->errors()
            ], 401);
        }
        $image = $req->image;
        if ($image) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = "Image" .  time() . '.' . $extention;
            $path =  url('/images/OurClient/' . $filename);
        }
        $OurClient = OurClient::create([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
            "image" => $path,
            "category_our_work_id" => $req->category_our_work_id,
        ]);
        $file->move('images/OurClient/', $filename);
        return response()->json([
            'status' => true,
            'message' => 'Client Create Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $validateSupliers = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
                "image" => 'required|mimes:png,jpg',
                "category_our_work_id" => 'required|exists:category_our_works,id'
            ]
        );
        if ($validateSupliers->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateSupliers->errors()
            ], 401);
        }
        $OurClientimage = OurClient::findOrFail($id);
        $name = $OurClientimage->image;
        $nameImageUpdate = ltrim($name, url('images/OurClient'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/OurClient/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("images/OurClient/"), $nameOfNewImage);
            $path =  url('images/OurClient/' . $nameOfNewImage);
        }
        $OurClientimage->update([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
            "image" => $path,
            "category_our_work_id" => $req->category_our_work_id,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'OurClient Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $OurClientDelete = OurClient::findOrFail($id);
        $imagePath =  $OurClientDelete->image;
        $nameImageUpdate = ltrim($imagePath, url('/images/OurClient'));
        if ($nameImageUpdate) {
            unlink(public_path("images/OurClient/") . $nameImageUpdate);
        }
        $OurClientDelete->delete();
        return response()->json([
            'status' => true,
            'message' => 'OurClient Deleted Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}