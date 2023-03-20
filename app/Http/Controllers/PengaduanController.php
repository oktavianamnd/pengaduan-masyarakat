<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PengaduanController;

class PengaduanController extends Controller
{
    public function index(){
        $pengaduan = pengaduan::get();
        return view('masyarakat.dashboard')->with([
            'pengaduans' => $pengaduan
        ]);
    }

    public function create(){
        return view('masyarakat.create');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'isi_laporan' => 'required',
            'foto' => 'required|mimes:png,jpg',
        ]);
        $file_name = time(). '_' . $request->foto->getClientOriginalName();
        $request->foto->move(public_path("img/pengaduan"), $file_name);
        Pengaduan::create([
            'nik' => Auth::user()->nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $file_name,
            'tgl_pengaduan' => now()
        ]);

        return redirect()->route('dashboard');
    }
}
