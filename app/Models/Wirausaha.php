<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wirausaha extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumniId',
        'namaUsaha',
        'bidangUsaha',
        'tahunMasuk',
    ];
}
