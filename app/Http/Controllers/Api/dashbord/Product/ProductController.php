<?php

namespace App\Http\Controllers\Api\dashbord\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\http\Resources\ProductResource;

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
                    'category_id' => 'nullable',
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
                'category_id' => $req->category_id,
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
                'category_id' => 'nullable',
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
            "category_id" => $req->category_id,
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
        // $deleteImageProdu
        $product->delete();
        if ($product) {
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