<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index(){
        $petugas = Petugas::get();
        return view('admin.petugas.show')->with([
            'petugass' => $petugas
        ]);
    }
    public function create(){
        return view('admin.petugas.create');
    }
    public function store(Request $request){
        $validate = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas,username|unique:masyarakat,username',
            'password' => 'required',
            'telp' => 'required|numeric'
        ]);

        Petugas::insert([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'level' => 'petugas'
        ]);

        return redirect()->route('admin.petugas.index')->with('success', 'berhasil menambah petugas');
    }

    public function destroy($id){
        $data = Petugas::where('id_petugas', $id)->firstOrFail();
        $data->delete();
        return redirect()->route('admin.petugas.index')->with('success', 'berhasil menghapus petugas');
    }
}
