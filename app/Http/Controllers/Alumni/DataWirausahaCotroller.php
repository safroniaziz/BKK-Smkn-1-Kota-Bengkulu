<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Wirausaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataWirausahaCotroller extends Controller
{
    public function index(){
        $wirausahas = Wirausaha::where('alumniId',Auth::user()->id)->get();
        return view('alumni/wirausaha.index',compact('wirausahas'));
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
        ];
        $attributes = [
            'namaUsaha'   =>  'Nama Usaha',
            'bidangUsaha'   =>  'Bidang Usaha',
            'tahunMulai'   =>  'Tahun Mulai',
            'alamat'   =>  'Alamat',
        ];
        $this->validate($request, [
            'namaUsaha' =>  'required',
            'bidangUsaha'  =>  'required',
            'tahunMulai'  =>  'numeric',
            'alamat'  =>  'required',
        ],$messages,$attributes);

        Wirausaha::create([
            'alumniId'  =>  Auth::user()->id,
            'namaUsaha'  =>  $request->jabatan, 
            'bidangUsaha'  =>  $request->penghasilan, 
            'tahunMulai'  =>  $request->tahunMulai, 
            'alamat'  =>  $request->alamat, 
        ]);
        $notification = array(
            'message' => 'Berhasil, data wirausaha berhasil ditambahkan !',
            'alert-type' => 'success'
        );
        return redirect()->route('alumni.wirausaha')->with($notification);
    }

    public function delete($id){
        Wirausaha::destroy($id);
        $notification = array(
            'message' => 'Berhasil, data wirausaha berhasil dihapus !',
            'alert-type' => 'success'
        );
        return redirect()->route('alumni.wirausaha')->with($notification);
    }
}
