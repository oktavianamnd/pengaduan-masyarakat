@extends('_adminlayout.app')
@section('title', 'Halaman Pengaduan')
@section('content')

    <div class="col-lg-12 grid-margin stretch-card" style="padding: 30px;">
        <div class="card-header d-flex justify-content-between">
            <h4>Data Pengaduan</h4>
            <form action="{{ route('admin.pengaduan.print') }}" method="get" id="print-form">
                <select name="month" id="month" class="form-select">
                    <option value="" selected>semua</option>
                    @foreach ($month as $item)
                        <option value="{{ $item['value'] }}">{{ $item['month'] }}</option>
                    @endforeach
                </select>
                <button typr="button" class="btn btn-primary" id="btn-prn">Cetak</button>
            </form>
        </div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Nama Pengadu</th>
                    <th scope="col">Isi Laporan</th>
                    <th scope="col">Tanggal Pengaduan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengaduans as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->masyarakat->nama }}</td>
                        <td>{{ $item->isi_laporan }}</td>
                        <td>{{ $item->tgl_pengaduan }}</td>
                        <td><a class="btn btn-primary"
                                href="{{ route('admin.pengaduan.edit', $item->id_pengaduan) }}">Tanggapi</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/printpage.js') }}"></script>
    <script>
        $('#btn-prn').on('click', function() {
            var url = $('#print-form').attr('action') + '?' + $('#print-form').serialize();
            var printWindow = window.open(url, 'Print Window', 'height=600,width=800');
            printWindow.onload = function() {
                printWindow.print();
            };
            return false;
        });
    </script>
@endsection
