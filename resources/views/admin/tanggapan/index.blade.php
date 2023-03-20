@extends('_adminlayout.app')
@section('title', 'Data Tanggapan')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card" style="padding: 30px;">
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Tanggal pengaduan</th>
                    <th scope="col">Pengadu</th>
                    <th scope="col">Tanggal Tanggapan</th>
                    <th scope="col">Petugas</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tanggapan as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->pengaduan->tgl_pengaduan}}</td>
                        <td>{{$item->pengaduan->masyarakat->nama}}</td>
                        <td>{{$item->tgl_tanggapan}}</td>
                        <td>{{$item->petugas->nama_petugas}}</td>
                        <td><a class="btn btn-primary" href="{{route('admin.tanggapan.show', $item->id_tanggapan)}}">Lihat Tanggapan</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
