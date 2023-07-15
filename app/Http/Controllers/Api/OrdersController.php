<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Http\Resources\OrdersResource;

class OrdersController extends Controller
{

    public function index()
    {
        // $orders = Orders::all();
        $orders = Orders::with(['menu','meja'])->get();

        return response()->json([
            'data' => $orders,
            'message' => 'success, get all orders',
            'status' => '200',
        ], 200);
    }

    public function store(Request $request)
    {
        $orders = Orders::create([
            'menu_id' => $request->menu_id,
            'meja_id' => $request->meja_id,
            'nama_customer' => $request->nama_customer,
            'total' => $request->total,
            'status' => $request->status,
            'jumlah' => $request->jumlah,
        ]);

        return response()->json([
            'data' => $orders,
            'message' => 'success, create new orders',
            'status' => '200',
        ], 200);
    }

    public function show($id)
    {
        $orders = Orders::find($id);
        return response()->json([
            'data' => $orders,
            'message' => 'success, get orders by id',
            'status' => '200',
        ], 200);
    }

    // public function confirm($id){
    //     $orders = Orders::find($id);
    //     dd($orders->menu->stok);
    //     $orders->status = 'confirmed';
    //     $orders->menu->stok = $orders->menu->stok - $orders->jumlah;
    //     $orders->save();

    //     return response()->json([
    //         'data' => $orders,
    //         'message' => 'success, confirm orders by id',
    //         'status' => '200',
    //     ], 200);
    // }

    public function confirm($id)
    {
        $order = Orders::find($id);
        $menu = $order->menu; // Menggunakan panah (->) untuk mengakses relasi menu
        if($menu->stok < $order->jumlah){
            return response()->json([
                'data' => $order,
                'message' => 'Failed, stok kurang',
                'status' => '200',
            ], 200);
        }

        $menu->stok = $menu->stok - $order->jumlah;
        $menu->save();
        $order->status = 'confirmed';
        $order->save();

        return response()->json([
            'data' => $order,
            'message' => 'Success, confirm orders by id',
            'status' => '200',
        ], 200);
    }
}
