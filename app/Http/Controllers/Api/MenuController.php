<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all menu
        $menu = Menu::all();
        return response()->json([
            'data' => MenuResource::collection($menu),
            'message' => 'success, fetch all menu',
            'status' => '200',
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'kategori' => 'required|string',
            'status' => 'required|string',
            'stok' => 'required|integer',
            'rating' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $image_path = $request->file('gambar')->store('image', 'public');
        $menu = Menu::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $image_path,
            'kategori' => $request->kategori,
            'status' => $request->status,
            'stok' => $request->stok,
            'rating' => $request->rating,
        ]);

        return response()->json([
            'data' => new MenuResource($menu),
            'message' => 'success, menu created',
            'status' => '201',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        $menu = Menu::find($menu->id);
        return response()->json([
            'data' => new MenuResource($menu),
            'message' => 'success, fetch menu',
            'status' => '200',
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu = Menu::find($menu->id);
        $menu->delete();
        return response()->json([
            'data' => new MenuResource($menu),
            'message' => 'success, delete menu',
            'status' => '200',
        ], 200);
    }
    public function showImage(Request $request, $namafile){
        $path = storage_path('app/public/image/'.$namafile);
        return response()->file($path);
    }
}
