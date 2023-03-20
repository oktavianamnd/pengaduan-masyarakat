@extends('_userlayout.app')
@section('content')
<br>
        <form action="{{route('masyarakat.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Isi Laporan</label>
                <input type="text" name="isi_laporan" id="isi_laporan">
            </div>
            <br>
            <div>
                <label>Foto</label>
                <input type="file" name="foto" id="foto">
            </div>
            <br>
            <button type="submit">kirim</button>
        </form>
@endsection
