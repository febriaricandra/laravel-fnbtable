<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'nama',
    ];
    //customers one to one orders
    public function orders()
    {
        return $this->hasOne(Orders::class);
    }
}
