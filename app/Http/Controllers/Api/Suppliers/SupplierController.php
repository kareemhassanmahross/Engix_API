<?php

namespace App\Http\Controllers\Api\Suppliers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::get();
        if ($suppliers->count() == 0) {
            return response()->json([
                'status' => true,
                'message' => 'nothing suppliers now',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response($suppliers);
    }
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return response($supplier);
    }
    public function create(Request $req)
    {
        $validateSupliers = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
                "image" => 'required|mimes:png,jpg'
            ]
        );
        if ($validateSupliers->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateSupliers->errors()
            ], 401);
        }
        $image = $req->image;
        if ($image) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = "Image" .  time() . '.' . $extention;
            $path =  url('/images/suppliser/' . $filename);
            $file->move('images/suppliser/', $filename);
        }
        $Supplier = Supplier::create([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
            "image" => $path,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Image Uploaded Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        dd($req);
        $validateSupliers = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
                // "image" => 'required|mimes:png,jpg'
            ]
        );
        if ($validateSupliers->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateSupliers->errors()
            ], 401);
        }
        $suppliersimage = Supplier::findOrFail($id);
        $name = $suppliersimage->image;
        $nameImageUpdate = ltrim($name, url('images/suppliser'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/suppliser/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("images/suppliser/"), $nameOfNewImage);
            $path =  url('images/suppliser/' . $nameOfNewImage);
        }
        $suppliersimage->update([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
            "image" => $path,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Image Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $supplierDelete = Supplier::findOrFail($id);
        $imagePath =  $supplierDelete->image;
        $nameImageUpdate = ltrim($imagePath, url('/images/suppliser'));
        if ($nameImageUpdate) {
            unlink(public_path("images/suppliser/") . $nameImageUpdate);
        }
        $supplierDelete->delete();
        return response()->json([
            'status' => true,
            'message' => 'Image Deleted Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}