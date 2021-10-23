<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarKerja extends Model
{
    use HasFactory;
    protected $fillable = [
        'lowonganId',
        'namaPendaftar',
        'email',
        'alamat',
        'telephone',
        'pendidikanTerakhir',
        'cv',
        'ijazahTerakhir',
    ];
}
