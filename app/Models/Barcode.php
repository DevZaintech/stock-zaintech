<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'serial_number',
        'nama_mesin',
        'tanggal_terjual',
        'id_user',
    ];

    // Relasi: Barcode milik 1 user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}