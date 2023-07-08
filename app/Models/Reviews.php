<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'orders_id',
        'review',
    ];

    public function orders()
    {
        return $this->belongsTo(Orders::class);
    }
}
