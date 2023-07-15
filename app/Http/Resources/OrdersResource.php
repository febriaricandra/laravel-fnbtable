<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'id' => $this->id,
            // 'meja' => new MejaResource($this->meja),
            // 'customer' => new CustomersResource($this->customer),
            // 'menu' => new MenuResource($this->menu),
            'id' => $this->id,
            'menu_id' => new MenuResource($this->menu),
            'meja_id' => new MejaResource($this->meja),
            'nama_customer' => $this->nama_customer,
            'total' => $this->total,
            'status' => $this->status,
            'jumlah' => $this->jumlah,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
