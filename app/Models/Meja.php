<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = 'meja';
    protected $fillable = [
        'nomor_meja',
        'qrcode',
    ];
    
    public function orders()
    {
        return $this->hasOne(Orders::class);
    }
}
