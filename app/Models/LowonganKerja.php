<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganKerja extends Model
{
    use HasFactory;
    protected $fillable = [
        'kerjaSamaId',
        'gambar',
        'usiaMinimal',
        'usiaMaksimal',
        'jenisKelamin',
        'pendidikanMinimal',
        'bidangPekerjaan',
        'besaranGaji',
        'jurusanDibutuhkan',
        'tanggalAkhir',
        'informasiTambahan',
    ];
}
