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
        $meja = Meja::create([
            'nomor_meja' => $request->nomor_meja,
            'qrcode' => $request->qrcode,
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
        $meja = Meja::find($id);
        $meja->delete();
        return response()->json([
            'data' => $meja,
            'message' => 'success, delete meja by id',
            'status' => '200',
        ], 200);
    }
}
