<?php

namespace App\Http\Controllers\Api\dashbord\Program;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Programs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramsController extends Controller
{
    public function index()
    {
        $programs = Program::with('subcatagoryprogram')->with('medoul')->get();
        if ($programs->count() == 0) {
            return response()->json([
                'status' => true,
                'Massage' => 'Nothing Preograms Now !'
            ], 401);
        }
        return response($programs);
    }
    public function show($id)
    {
        $programs = Program::with('subcatagoryprogram')->where('id', $id)->get();
        if ($programs->count() == 0) {
            return response()->json([
                'status' => true,
                'Massage' => 'Nothing Preograms Now !'
            ], 401);
        }
        return response($programs);
    }
    public function create(Request $req)
    {
        $Program = Validator::make(
            $req->all(),
            [
                'descriptionAr' => 'required',
                'descriptionEn' => 'required',
                'image' => 'required|mimes:png,jpg',
                'youtupe' => 'required',
                'test' => 'required',
                'nameProgramAr' => 'required',
                'nameProgramEn' => 'required',
                'userName' => 'required',
                'password' => 'required',
                'sub_category_program_id' => 'nullable',
                'Meduol' => 'nullable'
            ]
        );
        if ($Program->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $Program->errors()
            ], 401);
        }
        $image = $req->image;
        if ($image) {
            $file = $req->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = "Image" .  time() . '.' . $extention;
            $path =  url('/images/Program/' . $filename);
        }
        Program::create([
            'descriptionAr' => $req->descriptionAr,
            'descriptionEn' => $req->descriptionEn,
            'image' => $path,
            'youtupe' => $req->youtupe,
            'test' => $req->test,
            'nameProgramAr' => $req->nameProgramAr,
            'nameProgramEn' => $req->nameProgramEn,
            'userName' => $req->userName,
            'password' => $req->password,
            'sub_category_program_id' => $req->sub_category_program_id,
            'Meduol' => $req->Meduol,
        ]);
        $file->move('images/Program/', $filename);
        return response()->json([
            'status' => true,
            'message' => 'Program Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $validateProgram = Validator::make(
            $req->all(),
            [
                'descriptionAr' => 'required',
                'descriptionEn' => 'required',
                'image' => 'required|mimes:png,jpg',
                'youtupe' => 'required',
                'test' => 'required',
                'nameProgramAr' => 'required',
                'nameProgramEn' => 'required',
                'userName' => 'required',
                'password' => 'required',
                'sub_category_program_id' => 'nullable',
                'Meduol' => 'nullable',
            ]
        );
        if ($validateProgram->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateProgram->errors()
            ], 401);
        }
        $Program = Program::findOrFail($id);
        $name = $Program->image;
        $nameImageUpdate = ltrim($name, url('/images/Program'));
        $imagess = $req->file("image");
        if ($imagess) {
            if ($nameImageUpdate !== null) {
                unlink(public_path("images/Program/") . $nameImageUpdate);
            }
            $image = $req->file("image");
            $nameOfNewImage = "Image" . time() . "." . $image->getClientOriginalExtension();
            $path =  url('/images/Program/' . $nameOfNewImage);
        }
        $Program->update([
            'descriptionAr' => $req->descriptionAr,
            'descriptionEn' => $req->descriptionEn,
            'image' => $path,
            'youtupe' => $req->youtupe,
            'test' => $req->test,
            'nameProgramAr' => $req->nameProgramAr,
            'nameProgramEn' => $req->nameProgramEn,
            'userName' => $req->userName,
            'password' => $req->password,
            'sub_category_program_id' => $req->sub_category_program_id,
            'Meduol' => $req->Meduol
        ]);

        $image->move(public_path("images/Program/"), $nameOfNewImage);
        return response()->json([
            'status' => true,
            'message' => 'Program Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $Program = Program::findOrFail($id);
        $imagePath =  $Program->image;
        $nameImageDelete = ltrim($imagePath, url('/images/Program'));
        if ($nameImageDelete) {
            unlink(public_path("images/Program/") . $nameImageDelete);
        }
        $Program->delete();
        if ($Program) {
            return response()->json([
                'status' => true,
                'message' => 'Program Deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Program not Deleted',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 401);
    }
}
