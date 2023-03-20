@extends('_adminlayout.app')
@section('title', 'Data Petugas')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card" style="padding: 30px;">
        <div><a class="btn btn-success" href="{{ route('admin.petugas.create') }}">Create</a></div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Username</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petugass as $petugas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $petugas->nama_petugas }}</td>
                        <td>{{ $petugas->username }}</td>
                        <td>{{ $petugas->telp }}</td>
                        <td>{{ $petugas->level }}</td>
                        <td>
                            <form method="post" action="{{route('admin.petugas.destroy', $petugas->id_petugas)}}">
                                @csrf
                                @method('delete')
                            <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
