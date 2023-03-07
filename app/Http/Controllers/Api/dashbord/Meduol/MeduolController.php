<?php

namespace App\Http\Controllers\Api\dashbord\Meduol;

use App\Http\Controllers\Controller;
use App\Models\Meduol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeduolController extends Controller
{
    public function index()
    {
        $meduol = Meduol::with('program')->get();
        if ($meduol->count() == 0) {
            return response()->json([
                'status' => true,
                'Massage' => 'Nothing Meduols Now !'
            ], 401);
        }
        return response($meduol);
    }
    public function show($id)
    {
        $meduol = Meduol::with('program')->where('id', $id)->get();
        if ($meduol->count() == 0) {
            return response()->json([
                'status' => true,
                'Massage' => 'Nothing Meduols Now !'
            ], 401);
        }
    }
    public function create(Request $req)
    {
        $validateMeduol = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
                'programs_id' => 'nullable'
            ]
        );
        if ($validateMeduol->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateMeduol->errors()
            ], 401);
        }
        Meduol::create([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
            'programs_id' => $req->programs_id
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Meduol Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $validateMeduol = Validator::make(
            $req->all(),
            [
                "nameAr" => 'required',
                "nameEn" => 'required',
                'programs_id' => 'nullable'
            ]
        );
        if ($validateMeduol->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateMeduol->errors()
            ], 401);
        }
        $Meduol = Meduol::findOrFail($id);
        $Meduol->update([
            "nameAr" => $req->nameAr,
            "nameEn" => $req->nameEn,
            'programs_id' => $req->programs_id
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Meduol Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $Meduol = Meduol::findOrFail($id);
        $Meduol->delete();
        if ($Meduol) {
            return response()->json([
                'status' => true,
                'message' => 'Meduol Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Meduol not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}