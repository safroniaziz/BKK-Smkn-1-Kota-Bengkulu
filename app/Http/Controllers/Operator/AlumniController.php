<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index(){
        $alumnis = Alumni::join('jurusans','jurusans.id','alumnis.jurusanId')
                            ->select('alumnis.id','namaAlumni','jenisKelamin','namaAlumni','tahunMasuk','tahunLulus','tanggalLahir',
                                     'tempatLahir','email','telephone','alamat','isPengangguran')->get();
        return view('operator/alumni.index',compact('alumnis'));
    }

    public function add(){
        $jurusans = Jurusan::select('id','namaJurusan')->get();
        return view('operator.alumni.add',compact('jurusans'));
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'namaAlumni'   =>  'Nama Alumni',
            'jurusanId'   =>  'Jurusan',
            'jenisKelamin'   =>  'Jenis Kelamin',
            'tahunMasuk'   =>  'Jenis Kelamin',
            'tahunLulus'   =>  'Jenis Kelamin',
            'tempatLahir'   =>  'Jenis Kelamin',
            'tanggalLahir'   =>  'Jenis Kelamin',
            'email'   =>  'Jenis Kelamin',
            'telephone'   =>  'Jenis Kelamin',
            'alamat'   =>  'Jenis Kelamin',
            'isNganggur'   =>  'Jenis Kelamin',
        ];
        $this->validate($request, [
            'namaAlumni'        =>  'required',
            'jurusanId'         =>  'required',
            'jenisKelamin'      =>  'required',
            'tahunMasuk'        =>  'required',
            'tahunLulus'        =>  'required',
            'tempatLahir'       =>  'required',
            'tanggalLahir'      =>  'required',
            'email'             =>  'required',
            'telephone'         =>  'required',
            'alamat'            =>  'required',
            'isNganggur'        =>  'required',
        ],$messages,$attributes);

        Alumni::create([
            'namaAlumni'   =>  $request->namaAlumni,
            'jurusanId'   =>  $request->jurusanId,
            'jenisKelamin'   =>  $request->jenisKelamin,
            'tahunMasuk'   =>  $request->tahunMasuk,
            'tahunLulus'   =>  $request->tahunLulus,
            'tempatLahir'   =>  $request->tempatLahir,
            'tanggalLahir'   =>  $request->tanggalLahir,
            'email'   =>  $request->email,
            'telephone'   =>  $request->telephone,
            'alamat'   =>  $request->alamat,
            'isNganggur'   =>  $request->isNganggur,
        ]);
        $notification = array(
            'message' => 'Berhasil, data alumni berhasil diubah!',
            'alert-type' => 'success'
        );

        return redirect()->route('operator.alumni')->with($notification);
    }

    public function edit($id){
        $alumni = Alumni::where('id',$id)->first();
        return $alumni;
    }

    public function update(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'namaalumni'   =>  'Nama alumni',
        ];
        $this->validate($request, [
            'namaalumni'    =>  'required',
        ],$messages,$attributes);

        Alumni::where('id',$request->id)->update([
            'namaalumni'   =>  $request->namaalumni,
        ]);
        $notification = array(
            'message' => 'Berhasil, data alumni berhasil diubah!',
            'alert-type' => 'success'
        );

        return redirect()->route('operator.alumni')->with($notification);
    }

    public function delete(Request $request){
        Alumni::destroy($request->id);
        $notification = array(
            'message' => 'Berhasil, data alumni berhasil dihapus!',
            'alert-type' => 'success'
        );

        return redirect()->route('operator.alumni')->with($notification);
    }
}
