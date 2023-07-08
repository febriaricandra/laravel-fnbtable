<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MejaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Meja;

class MejaController extends Controller
{
    //

    public function index(){
        $meja = Meja::all();
        return response()->json([
            'data' => MejaResource::collection($meja),
            'message' => 'success, get all meja',
            'status' => '200',
        ], 200);
    }

    public function create(){

    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nomor_meja' => 'required|integer|max:255',
            'qrcode' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $image_path = $request->file('qrcode')->store('image', 'public');
        $meja = Meja::create([
            'nomor_meja' => $request->nomor_meja,
            'qrcode' => $image_path,
        ]);
        
        return response()->json([
            'data' => $meja,
            'message' => 'success, create new meja',
            'status' => '200',
        ], 200);
    }

    public function show(Meja $meja){
        $meja = Meja::find($meja->id);
        return response()->json([
            'data' => new MejaResource($meja),
            'message' => 'success, get meja by id',
            'status' => '200',
        ], 200);
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
