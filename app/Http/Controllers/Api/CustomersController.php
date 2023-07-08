<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CustomersResource;

class CustomersController extends Controller
{
    //
    public function index(){
        $customers = Customers::all();
        return response()->json([
            'data' => CustomersResource::collection($customers),
            'message' => 'success, get all customers',
            'status' => '200',
        ], 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nomor_hp' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $customers = Customers::create([
            'nama' => $request->nama,
            'nomor_hp' => $request->nomor_hp,
        ]);

        return response()->json([
            'data' => $customers,
            'message' => 'success, create new customers',
            'status' => '200',
        ], 200);
    }

    public function show(Customers $customers){
    }
}
