<?php

namespace App\Http\Controllers\Api\dashbord\categoyOffer;

use App\Http\Controllers\Controller;
use App\Models\CategoryOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoyOfferController extends Controller
{
    public function index()
    {
        $categoryOffers = CategoryOffer::with('offer')->get();
        if ($categoryOffers->count() == 0) {
            return response()->json([
                'status' => true,
                'message' => 'nothing Category Offers now',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response($categoryOffers);
    }
    public function show($id)
    {
        $categoryOffer = CategoryOffer::findOrFail($id);
        return response($categoryOffer);
    }
    public function create(Request $req)
    {
        $validateCategoryOffer = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
            ]
        );
        if ($validateCategoryOffer->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateCategoryOffer->errors()
            ], 401);
        }
        $category =  CategoryOffer::create([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Category Offer Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $validateCategoryOffer = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
            ]
        );
        if ($validateCategoryOffer->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateCategoryOffer->errors()
            ], 401);
        }
        $categoryOffer = CategoryOffer::findOrFail($id);
        $categoryOffer->update([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Category Offer Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $categoryOffer = CategoryOffer::findOrFail($id);
        $categoryOffer->delete();
        if ($categoryOffer) {
            return response()->json([
                'status' => true,
                'message' => 'Category Offer Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Category Offer not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}