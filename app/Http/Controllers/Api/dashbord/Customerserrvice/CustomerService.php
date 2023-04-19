<?php

namespace App\Http\Controllers\Api\dashbord\Customerserrvice;

use App\Http\Controllers\Controller;
use App\Models\CustomerService as ModelsCustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerService extends Controller
{
    public function index()
    {
        $customerService = ModelsCustomerService::get();
        if ($customerService->count() == 0) {
            return response()->json([
                'status' => false,
                'massage' => 'Nothing Customer Service Now !'
            ], 200);
        }
        return response($customerService);
    }
    public function show($id)
    {
        $customerService = ModelsCustomerService::where('id', $id)->get();
        if ($customerService->count() != 1) {
            return response()->json([
                'status' => false,
                'massage' => 'Nothing Customer Service Now !'
            ], 200);
        }
        return response($customerService);
    }
    public function create(Request $req)
    {
        $CustomerSevice = Validator::make(
            $req->all(),
            [
                // 'name' => 'required',
                'phone' => 'required'
            ]
        );
        if ($CustomerSevice->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $CustomerSevice->errors()
            ], 401);
        }
        ModelsCustomerService::create([
            // 'name' => $req->name,
            'phone' => $req->phone,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Customer Services Created Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function update(Request $req, $id)
    {
        $CustomerSevice = Validator::make(
            $req->all(),
            [
                // 'name' => 'required',
                'phone' => 'required'
            ]
        );
        if ($CustomerSevice->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $CustomerSevice->errors()
            ], 401);
        }
        $customerService = ModelsCustomerService::findOrFail($id);
        $customerService->update([
            // 'name' => $req->name,
            'phone' => $req->phone,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Customer Services Updated Successfully',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
    public function destroy($id)
    {
        $customerService = ModelsCustomerService::findOrFail($id);
        $customerService->delete();
        if ($customerService) {
            return response()->json([
                'status' => true,
                'message' => 'Customer Services deleted Successfully',
                // 'token' => $product->createToken("API TOKEN")->plainTextToken
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Nothing Customer Services',
            // 'token' => $product->createToken("API TOKEN")->plainTextToken
        ], 404);
    }
}
