@extends('_adminlayout.app')
@section('title', 'Tambah Petugas')
@section('content')
<form action="{{route('admin.petugas.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Nama Petugas</label>
        <input type="text" name="nama_petugas" id="nama_petugas">
    </div>
    <br>
    <div>
        <label>Username</label>
        <input type="text" name="username" id="username">
    </div>
    <br>
    <div>
        <label>Password</label>
        <input type="password" name="password" id="password">
    </div>
    <br>
    <div>
        <label>Telepon</label>
        <input type="number" name="telp" id="telp">
    </div>
    <br>
    
    <button type="submit">kirim</button>
</form>
@endsection