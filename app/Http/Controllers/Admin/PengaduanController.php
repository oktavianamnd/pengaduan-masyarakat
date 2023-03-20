<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index(){
        $month = [
            [
                'value' => '01',
                'month' => 'Januari'
             ],
            [
                'value' => '02',
                'month' => 'Februari'
             ],
            [
                'value' => '03',
                'month' => 'Maret'
             ],
             [
                'value' => '04',
                'month' => 'April'
             ],
            [
                'value' => '05',
                'month' => 'Mei'
             ],
            [
                'value' => '06',
                'month' => 'Juni'
             ],
            [
                'value' => '07',
                'month' => 'Juli'
             ],
            [
                'value' => '08',
                'month' => 'Agustus'
             ],
            [
                'value' => '09',
                'month' => 'September'
             ],
            [
                'value' => '10',
                'month' => 'Oktober'
             ],
            [
                'value' => '11',
                'month' => 'November'
             ],
            [
                'value' => '12',
                'month' => 'Desember'
             ]
        ];
        $pengaduans = Pengaduan::with('masyarakat')->where('status', 'proses')->orWhere('status', '0')->get();
        return view('admin.pengaduan.index', compact('pengaduans', 'month'));
    }
    public function edit($id){
        $data = Pengaduan::with('masyarakat')->where('id_pengaduan', $id)->first();
        if ($data->status == 'selesai') {
            return back();
        }
        return view('admin.pengaduan.edit', compact('data'));

    }
    public function update(Request $request, $id){
        $request->validate([
            'tanggapan' => 'required'
        ]);
        $data = Pengaduan::with('masyarakat')->where('id_pengaduan', $id)->first();
        if (!$data || $data->status == 'selesai') {
            return back();
        }
        $data->update([
            'status'=>'selesai'
        ]);
        Tanggapan::create([
            'tgl_tanggapan'=>now(),
            'tanggapan'=>$request->tanggapan,
            'id_pengaduan' => $data->id_pengaduan,
            'id_petugas' => Auth::guard('petugas')->user()->id_petugas
        ]);
        return redirect()->route('admin.pengaduan.index')->with('success', 'Berhasil menanggapi');
    }
    public function print(Request $request){
        $data = Pengaduan::with('masyarakat')->get();
        if ($request->filled('month')) {
            $dateObj   = DateTime::createFromFormat('!m', $request->month);
            $monthName = $dateObj->format('F'); // March
            $year = now()->year;
            $data = Pengaduan::with('masyarakat')->whereMonth('tgl_pengaduan', $request->month)->whereYear('tgl_pengaduan', now()->year)->get();
            return view('admin.pengaduan.print', compact('monthName', 'data', 'year'));
        }
        return view('admin.pengaduan.print', compact('data'));
    }
}
