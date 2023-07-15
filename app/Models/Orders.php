<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'menu_id',
        'meja_id',
        'nama_customer',
        'total',
        'status',
        'jumlah',
    ];
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }
    public function order_item()
    {
        return $this->belongsTo(Order_item::class);
    }
}
