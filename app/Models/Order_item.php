<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    protected $table = 'order_item';
    protected $fillable = [
        'orders_id',
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
