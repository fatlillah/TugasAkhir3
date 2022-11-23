<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index(){
        $data = Mahasiswa::all();
        return view('mahasiswa/dataMahasiswa', compact('data'));
    }

    public function insertMahasiswa(){
        $data = Mahasiswa::all();
        return view('mahasiswa/insertMahasiswa');
    }

    public function addMahasiswa(Request $request){
        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil di Input');
    }

    public function tampilDataMahasiswa($id){
        $data = Mahasiswa::find($id);

        return view('mahasiswa/updateMahasiswa', compact('data'));
    }
    
    public function updateDataMahasiswa(Request $request, $id){
        $data = Mahasiswa::find($id);
        $data->update($request->all());

        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil di Update');
    }
    
    public function daleteMahasiswa($id){
        $data = Mahasiswa::find($id);
        $data->delete();

        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil di Delete');
    }

    public function store(Request $request)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $text = $section->addText($request->get('name'));
        $text = $section->addText($request->get('email'));
        $text = $section->addText($request->get('number'),array('name'=>'Arial','size' => 20,'bold' => true));
        $section->addImage("./images/Krunal.jpg");  
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('Appdividend.docx');
        return response()->download(public_path('Appdividend.docx'));
    }
}
