<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;

class pegawai_controller extends Controller
{
    //
    public function index(){
        $data = pegawai::all();
        return view('index',compact('data'));
    }

    public function tambah_data(){
        $data = pegawai::all();
        return view('tambah_pegawai',compact('data'));
    }

    public function proses_tambah(Request $req){
        $data = pegawai::create([
            'NIP' => $req->NIP,
            'nama'=> $req->nama,
            'tanggal_lahir'=> $req->tanggal_lahir,
            'tempat_lahir'=> $req->tempat_lahir,
            'alamat'=> $req->alamat
        ]);
            $data->save();


        return redirect()->route('pegawai');

    }


    public function form_edit($id) {
        $data = pegawai::findOrFail($id); // Mengambil satu data pegawai
        return view('edit_pegawai', compact('data')); // Pastikan 'data' berupa objek tunggal
    }

    public function update(Request $req, $id){
        $data = pegawai::findOrFail($id);

        $data->update([
            'NIP' => $req->NIP,
            'nama'=> $req->nama,
            'tanggal_lahir'=> $req->tanggal_lahir,
            'tempat_lahir'=> $req->tempat_lahir,
            'alamat'=> $req->alamat
        ]);

        return redirect()->route('pegawai');
    }

    public function destroy($id){
        $data = pegawai::find($id);

        $data->is_delete = 1;
        $data->save();

        return redirect()->route('pegawai');
    }
}


