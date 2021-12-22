<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Kuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPendidikanController extends Controller
{
    public function index(){
        $pendidikans = Kuliah::where('alumniId',Auth::user()->id)->get();
        return view('alumni/pendidikan.index',compact('pendidikans'));
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
        ];
        $attributes = [
            'tempatKuliah'   =>  'Tempat Kuliah',
            'jurusan'   =>  'Jurusan',
            'tahunMasuk'   =>  'Tahun Masuk',
            'alamat'   =>  'Alamat',
        ];
        $this->validate($request, [
            'tempatKuliah' =>  'required',
            'jurusan' =>  'required',
            'tahunMasuk'    =>  'required|numeric',
            'alamat'  =>  'required',
        ],$messages,$attributes);

        Kuliah::create([
            'alumniId'  =>  Auth::user()->id,
            'tempatKuliah'  =>  $request->tempatKuliah, 
            'jurusan'  =>  $request->jurusan, 
            'tahunMasuk'  =>  $request->tahunMasuk, 
            'alamat'  =>  $request->alamat, 
        ]);
        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil ditambahkan !',
            'alert-type' => 'success'
        );
        return redirect()->route('alumni.pendidikan')->with($notification);
    }

    public function delete($id){
        Kuliah::destroy($id);
        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil dihapus !',
            'alert-type' => 'success'
        );
        return redirect()->route('alumni.pendidikan')->with($notification);
    }
}
