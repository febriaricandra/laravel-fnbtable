<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reviews;


class ReviewsControllers extends Controller
{
    //
    public function index(){
        $reviews = Reviews::all();
        return response()->json([
            'data' => $reviews,
            'message' => 'success, get all reviews',
            'status' => '200',
        ], 200);
    }

    public function store(Request $request){
        $reviews = Reviews::create([
            'nama_customer' => $request->nama_customer,
            'review' => $request->review,
        ]);
        
        return response()->json([
            'data' => $reviews,
            'message' => 'success, create new reviews',
            'status' => '200',
        ], 200);
    }
}
