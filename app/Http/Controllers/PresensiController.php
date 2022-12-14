<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presensi;

class PresensiController extends Controller
{
    public function index(){
        $data = Presensi::all();
         
        return view('presensi/dataPresensi', compact('data'));
    }

    public function insertPresensi(){
        $data = Presensi::all();

        return view('presensi/insertPresensi');
    }

    public function addPresensi(Request $request){
        Presensi::create($request->all());

        return redirect()->route('presensi')->with('success', 'Data Berhasil di Input');
    }

    public function tampilDataPresensi($id){
        $data = Presensi::find($id);

        return view('presensi/updatePresensi', compact('data'));
    }
    
    public function updatePresensi(Request $request, $id){
        $data = Presensi::find($id);
        $data->update($request->all());

        return redirect()->route('presensi')->with('success', 'Data Berhasil di Update');
    }
    
    public function deletePresensi($id){
        $data = Presensi::find($id);
        $data->delete();

        return redirect()->route('presensi')->with('success', 'Data Berhasil di Delete');
    }
}
