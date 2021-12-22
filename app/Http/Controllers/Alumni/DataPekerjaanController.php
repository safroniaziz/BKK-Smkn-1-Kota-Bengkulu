<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPekerjaanController extends Controller
{
    public function index(){
        $pekerjaans = Pekerjaan::where('alumniId',Auth::user()->id)->get();
        return view('alumni/pekerjaan.index',compact('pekerjaans'));
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
        ];
        $attributes = [
            'tempatKerja'   =>  'Tempat Kuliah',
            'jabatan'   =>  'Jabatan',
            'tahunMasuk'   =>  'Tahun Masuk',
            'tahunKeluar'   =>  'Tahun Keluar',
            'jenisPekerjaan'   =>  'Jenis Pekerjaan',
            'alamatKerja'   =>  'Alamat Kerja',
        ];
        $this->validate($request, [
            'tempatKerja' =>  'required',
            'jabatan' =>  'required',
            'tahunMasuk'  =>  'required|numeric',
            'tahunKeluar'  =>  'numeric',
            'jenisPekerjaan'  =>  'required',
            'alamatKerja'  =>  'required',
        ],$messages,$attributes);

        Pekerjaan::create([
            'alumniId'  =>  Auth::user()->id,
            'tempatKerja'  =>  $request->tempatKerja, 
            'jabatan'  =>  $request->jabatan, 
            'penghasilan'  =>  $request->penghasilan, 
            'tahunMasuk'  =>  $request->tahunMasuk, 
            'tahunKeluar'  =>  $request->tahunKeluar, 
            'jenisPekerjaan'  =>  $request->jenisPekerjaan, 
            'alamatKerja'  =>  $request->alamatKerja, 
        ]);
        $notification = array(
            'message' => 'Berhasil, data pekerjaan berhasil ditambahkan !',
            'alert-type' => 'success'
        );
        return redirect()->route('alumni.pekerjaan')->with($notification);
    }

    public function delete($id){
        Pekerjaan::destroy($id);
        $notification = array(
            'message' => 'Berhasil, data pekerjaan berhasil dihapus !',
            'alert-type' => 'success'
        );
        return redirect()->route('alumni.pekerjaan')->with($notification);
    }
}
