<?php

namespace App\Http\Controllers\Admin;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasyarakatController extends Controller
{
    public function index(){
        $masyarakat = Masyarakat::get();
        return view('admin.masyarakat.index')->with([
            'masyarakats' => $masyarakat
        ]);
    }
    public function destroy($id){
        $data = Masyarakat::where('nik', $id)->firstOrFail();
        $data->delete();
        return redirect()->route('admin..index')->with('success', 'berhasil menghapus petugas');
    }
}
