@extends('_adminlayout.app')
@section('title', 'Data Masyarakat')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card" style="padding: 30px;">
        <div><a class="btn btn-success" href="#">Create</a></div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($masyarakats as $masyarakat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $masyarakat->nik }}</td>
                        <td>{{ $masyarakat->nama }}</td>
                        <td>{{ $masyarakat->username }}</td>
                        <td>{{ $masyarakat->telp }}</td>
                        <td>
                            <form method="post" action="{{route('admin.masyarakat.destroy', $masyarakat->nik)}}">
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
