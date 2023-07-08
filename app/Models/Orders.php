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
        'customer_id',
        'meja_id',
        'total',
        'status',
        'jumlah',
    ];
    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customers::class);
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
