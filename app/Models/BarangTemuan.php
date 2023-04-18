<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangTemuan extends Model
{
    use HasFactory;
    
    protected $table = 'brg_temuan';
    
    protected $fillable = [
        'no_polisi',
        'lokasi',
        'spesifikasi',
        'foto',
        'created_at',
        'updated_at',
    ];
}
