<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    protected $fillable = [
        'jurusanId',
        'jurusans',
        'namaAlumni',
        'jenisKelamin',
        'namaAlumni',
        'tahunMasuk',
        'tahunLulus',
        'tempatLahir',
        'tanggalLahir',
        'email',
        'telephone',
        'alamat',
        'isPengangguran'
    ];
}
