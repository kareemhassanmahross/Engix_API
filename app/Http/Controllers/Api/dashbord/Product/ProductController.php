<?php

namespace App\Http\Controllers\Api\dashbord\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();
        return response($products);
    }
    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return response($product);
    }
    public function create(Request $req)
    {
        try {
            $validateProduct = Validator::make(
                $req->all(),
                [
                    'nameAr' => 'required',
                    'nameEn' => 'required',
                    'amount' => 'required',
                    'descriptionAr' => 'required',
                    'descriptionEn' => 'required',
                    'price' => 'required',
                    'subCategory_id' => 'nullable',
                ]
            );
            if ($validateProduct->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateProduct->errors()
                ], 401);
            }

            // dd($imageName);
            $product = Product::create([
                'nameAr' => $req->nameAr,
                'nameEn' => $req->nameEn,
                'amount' =>  $req->amount,
                'descriptionAr' => $req->descriptionAr,
                'descriptionEn' => $req->descriptionEn,
                'price' => $req->price,
                'subCategory_id' => $req->subCategory_id,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Product Created Successfully',
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
        $validateProduct = Validator::make(
            $req->all(),
            [
                'nameAr' => 'required',
                'nameEn' => 'required',
                'amount' => 'required',
                'descriptionAr' => 'required',
                'descriptionEn' => 'required',
                'price' => 'required',
                'subCategory_id' => 'nullable',
            ]
        );
        if ($validateProduct->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateProduct->errors()
            ], 401);
        }
        $product = Product::findOrFail($id);
        $product->update([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
            "amount" => $req->amount,
            "descriptionAr" => $req->descriptionAr,
            "descriptionEn" => $req->descriptionEn,
            "price" => $req->price,
            "subCategory_id" => $req->subCategory_id,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Product Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            $deleteImageProductImages = Image::select('image')->where("product_id", $id)->get();

            foreach ($deleteImageProductImages as $image) {
                $imagePath =  $image->image;
                $nameImageUpdate = ltrim($imagePath, url('/images/products'));
                if ($nameImageUpdate) {
                    unlink(public_path("images/products/") . $nameImageUpdate);
                }
            }
            $product->delete();
            return response()->json([
                'status' => true,
                'message' => 'Product Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Product not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}