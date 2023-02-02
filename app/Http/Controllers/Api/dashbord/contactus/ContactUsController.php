<?php

namespace App\Http\Controllers\Api\dashbord\contactus;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function index()
    {
        $ContactUs = ContactUs::get();
        if ($ContactUs->count() == 0) {
            return response()->json([
                'status' => true,
                'message' => 'Nothing Contact Us Now !',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response($ContactUs);
    }
    public function show($id)
    {
        $ContactUs = ContactUs::findOrFail($id);
        return response($ContactUs);
    }
    public function create(Request $req)
    {
        try {
            $validateContactUs = Validator::make(
                $req->all(),
                [
                    'email' => 'required',
                    'phone' => 'required',
                    'whatsApp' => 'required',
                    'tel' => 'required',
                ]
            );
            if ($validateContactUs->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateContactUs->errors()
                ], 401);
            }
            $ContactUs = ContactUs::create([
                'email' => $req->email,
                'phone' => $req->phone,
                'whatsApp' =>  $req->whatsApp,
                'tel' => $req->tel,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Contact Us Created Successfully',
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
        $validateContactUs = Validator::make(
            $req->all(),
            [
                'email' => 'required',
                'phone' => 'required',
                'whatsApp' => 'required',
                'tel' => 'required',
            ]
        );
        if ($validateContactUs->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateContactUs->errors()
            ], 401);
        }
        $ContactUs = ContactUs::findOrFail($id);
        $ContactUs->update([
            'email' => $req->email,
            'phone' => $req->phone,
            'whatsApp' => $req->whatsApp,
            'tel' => $req->tel,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Contact Us Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $ContactUs = ContactUs::findOrFail($id);
        $ContactUs->delete();
        if ($ContactUs) {
            return response()->json([
                'status' => true,
                'message' => 'Contact Us Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Contact Us not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}