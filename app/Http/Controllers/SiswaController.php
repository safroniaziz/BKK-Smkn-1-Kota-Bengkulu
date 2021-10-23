<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function allSiswa(){
        $siswas = DB::table('alumnis')->orderBy('id','desc')->get();
        return view('all_siswa',compact('siswas'));
    }
}
