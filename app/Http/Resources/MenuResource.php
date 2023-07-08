<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'gambar' => $this->gambar,
            'kategori' => $this->kategori,
            'status' => $this->status,
            'stok' => $this->stok,
            'rating' => $this->rating,
        ];
    }
}
