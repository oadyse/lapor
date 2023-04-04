<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangHilang extends Model
{
    use HasFactory;
    
    protected $table = 'brg_hilang';
    
    protected $fillable = [
        'no_polisi',
        'lokasi',
        'spesifikasi',
        'foto',
        'created_at',
        'updated_at',
    ];
}
