<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Http\Resources\OrdersResource;

class OrdersController extends Controller
{
    
    public function index(){
        $orders = Orders::all();
        return response()->json([
            'data' => OrdersResource::collection($orders),
            'message' => 'success, get all orders',
            'status' => '200',
        ], 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'menu_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'meja_id' => 'required|integer',
            'total' => 'required|integer',
            'status' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $orders = Orders::create([
            'menu_id' => $request->menu_id,
            'customer_id' => $request->customer_id,
            'meja_id' => $request->meja_id,
            'total' => $request->total,
            'status' => $request->status,
            'jumlah' => $request->jumlah,
        ]);

        return response()->json([
            'data' => new OrdersResource($orders),
            'message' => 'success, create new orders',
            'status' => '200',
        ], 200);
    }



}
