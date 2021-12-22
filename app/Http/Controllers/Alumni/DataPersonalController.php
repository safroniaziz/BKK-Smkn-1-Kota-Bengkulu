<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPersonalController extends Controller
{
    public function index(){
        $personal = User::where('id',Auth::user()->id)->first();
        $jurusans = Jurusan::select('id','namaJurusan')->get();
        return view('alumni.personal.index',compact('personal','jurusans'));
    }
    
    public function update(Request $request,$id){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
        ];
        $attributes = [
            'jurusanId'   =>  'Jurusan',
            'usernameLogin'   =>  'Username Login',
            'namaAlumni'   =>  'Nama Lengkap',
            'jenisKelamin'   =>  'Jenis Kelamin',
            'tahunMasuk'   =>  'Tahun Masuk',
            'tahunLulus'   =>  'Tahun Lulus',
            'tanggalLahir'   =>  'Tanggal Lahir',
            'tempatLahir'   =>  'Tempat Lahir',
            'email'   =>  'Email',
            'telephone'   =>  'Telephone',
            'alamat'   =>  'Alamat',
            'isPengangguran'   =>  'Status Pengangguran',
        ];
        $this->validate($request, [
            'jurusanId' =>  'required',
            'usernameLogin' =>  'required',
            'namaAlumni'    =>  'required',
            'jenisKelamin'  =>  'required',
            'tahunMasuk'    =>  'required',
            'tahunLulus'    =>  'required|numeric',
            'tanggalLahir'  =>  'required',
            'tempatLahir'   =>  'required',
            'email'    =>  'required|email',
            'telephone' =>  'required|numeric',
            'alamat'    =>  'required',
            'isPengangguran'    =>  'required',
        ],$messages,$attributes);

        User::where('id',$id)->update([
            'jurusanId' =>  $request->jurusanId,
            'usernameLogin' =>  $request->usernameLogin,
            'namaAlumni'    =>  $request->namaAlumni,
            'jenisKelamin'  =>  $request->jenisKelamin,
            'tahunMasuk'    =>  $request->tahunMasuk,
            'tahunLulus'    =>  $request->tahunLulus,
            'tanggalLahir'  =>  $request->tanggalLahir,
            'tempatLahir'   =>  $request->tempatLahir,
            'email' =>  $request->email,
            'telephone' =>  $request->telephone,
            'alamat'    =>  $request->alamat,
            'isPengangguran'    =>  $request->isPengangguran,
        ]);
        $notification = array(
            'message' => 'Berhasil, Data anda berhasil diperbarui !',
            'alert-type' => 'success'
        );
        return redirect()->route('alumni.personal')->with($notification);
    }
}
