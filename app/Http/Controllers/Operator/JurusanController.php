<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index(){
        $jurusans = Jurusan::select('id','namaJurusan')->get();
        return view('operator/jurusan.index',compact('jurusans'));
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'namaJurusan'   =>  'Nama Jurusan',
        ];
        $this->validate($request, [
            'namaJurusan'    =>  'required',
        ],$messages,$attributes);

        Jurusan::create([
            'namaJurusan'   =>  $request->namaJurusan,
        ]);
        $notification = array(
            'message' => 'Berhasil, data jurusan berhasil diubah!',
            'alert-type' => 'success'
        );

        return redirect()->route('operator.jurusan')->with($notification);
    }

    public function edit($id){
        $jurusan = Jurusan::where('id',$id)->first();
        return $jurusan;
    }

    public function update(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'namaJurusan'   =>  'Nama Jurusan',
        ];
        $this->validate($request, [
            'namaJurusan'    =>  'required',
        ],$messages,$attributes);

        Jurusan::where('id',$request->id)->update([
            'namaJurusan'   =>  $request->namaJurusan,
        ]);
        $notification = array(
            'message' => 'Berhasil, data jurusan berhasil diubah!',
            'alert-type' => 'success'
        );

        return redirect()->route('operator.jurusan')->with($notification);
    }

    public function delete(Request $request){
        Jurusan::destroy($request->id);
        $notification = array(
            'message' => 'Berhasil, data jurusan berhasil dihapus!',
            'alert-type' => 'success'
        );

        return redirect()->route('operator.jurusan')->with($notification);
    }
}
