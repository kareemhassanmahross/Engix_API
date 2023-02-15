<?php

namespace App\Http\Controllers\Api\dashbord\Offer;

use App\Http\Controllers\Controller;
use App\Models\CategoryOffer;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OfferController extends Controller
{
    public function __construct()
    {
        if (Auth::guard('admins')->check()) {
            $this->middleware('auth:sanctum');
            $this->middleware('can:Offers');
        } else {
            // $this->middleware('auth:sanctum');
        }
    }
    public function index()
    {
        $offers = Offer::with('categoryOffer')->get();
        // $arra = [];
        // foreach ($offers as $offer) {
        //     $Offer = [
        //         'nameAr' => $offer->nameAr,
        //         'nameEn' => $offer->nameEn,
        //         'image' => $offer->image,
        //         'descriptionAr' => $offer->descriptionAr,
        //         'descriptionEn' => $offer->descriptionEn,
        //         'expiresDate' => $offer->expiresDate,
        //         'category_offer_id' => $offer->category_offer_id,
        //         'created_at' => $offer->created_at->format('m/d/Y'),
        //         'updated_at' => Carbon::now($offer->updated_at),
        //         'category_offer' => CategoryOffer::select('nameAr', 'nameEn')->where('id', "=", $offer->category_offer_id)->get(),
        //     ];
        //     array_push($arra, $Offer);
        // }
        // $X = Carbon::now()->timezone('Africa/Cairo')->format('Y-m-d H:i:s');
        // dd($X);
        return response($offers);
    }
    public function show($id)
    {
        $offer = Offer::findOrFail($id);
        return response($offer);
    }
    public function create(Request $req)
    {
        try {
            $validateOffer = Validator::make(
                $req->all(),
                [
                    'nameAr' => 'required',
                    'nameEn' => 'required',
                    'image' => 'required|mimes:png,jpg',
                    'descriptionAr' => 'required',
                    'descriptionEn' => 'required',
                    'expiresDate' => 'required',
                    'category_offer_id' => 'nullable',
                ]
            );
            if ($validateOffer->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateOffer->errors()
                ], 401);
            }
            $image = $req->image;
            if ($image) {
                $file = $req->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = "Image" .  time() . '.' . $extention;
                $path =  url('/images/Offer/' . $filename);
            }
            $Offer = Offer::create([
                'nameAr' => $req->nameAr,
                'nameEn' => $req->nameEn,
                'image' =>  $path,
                'expiresDate' => $req->expiresDate,
                'descriptionAr' => $req->descriptionAr,
                'descriptionEn' => $req->descriptionEn,
                'category_offer_id' => $req->category_offer_id,
                // 'created_at' => Carbon::now()->timezone('Africa/Cairo')->format('Y-m-d H:i:s'),
                // 'updated_at' => Carbon::now()->timezone('Africa/Cairo')->format('Y-m-d H:i:s'),
            ]);
            $image->move(public_path("images/Offer/"), $filename);
            return response()->json([
                'status' => true,
                'message' => 'Offer Created Successfully',
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
                'image' => 'required|mimes:png,jpg',
                'descriptionAr' => 'required',
                'descriptionEn' => 'required',
                'expiresDate' => 'required',
                'category_offer_id' => 'nullable',
            ]
        );
        if ($validateProduct->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateProduct->errors()
            ], 401);
        }
        $newdataUpdate = Offer::findOrFail($id);
        $name = $newdataUpdate->image;
        $nameImageUpdate = ltrim($name, url('/images/Offer'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/Offer/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("images/Offer/"), $nameOfNewImage);
            $path =  url('/images/Offer/' . $nameOfNewImage);
        }
        $newdataUpdate->update([
            'nameAr' => $req->nameAr,
            'nameEn' => $req->nameEn,
            'image' =>  $path,
            'descriptionAr' => $req->descriptionAr,
            'descriptionEn' => $req->descriptionEn,
            'expiresDate' => $req->expiresDate,
            'category_offer_id' => $req->category_offer_id,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Offer Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $offerDelete = Offer::findOrFail($id);
        $imagePath =  $offerDelete->image;
        $nameImageDelete = ltrim($imagePath, url('/images/Offer'));
        if ($nameImageDelete) {
            unlink(public_path("images/Offer/") . $nameImageDelete);
        }
        $offerDelete->delete();
        return response()->json([
            'status' => true,
            'message' => 'Offer Deleted Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}