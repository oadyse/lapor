<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketIklan extends Model
{
    use HasFactory;
    protected $table = 'paket_iklan';
    
    protected $fillable = [
        'id',
        'nama',
        'periode',
        'harga',
        'created_at',
        'updated_at',
    ];
}
