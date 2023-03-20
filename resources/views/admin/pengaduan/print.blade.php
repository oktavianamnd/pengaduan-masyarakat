<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Pengaduan</title>
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Pekat Cigombong</h5>
                        <h5>Total Pengaduan : {{$data->count()}}</h5>
                    </div>
                    <div class="card-body">
                        @if (isset($monthName))
                            <h5>Pengaduan Bulan {{$monthName}} Tahun {{$year}}</h5>
                        @else
                            <h5>Pekat</h5>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pengadu</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Isi Laporan</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                <tr>
                                    <td>{{$item->masyarakat->nama}}</td>
                                    <td>{{date('d F Y', strtotime($item->tgl_pengaduan))}}</td>
                                    <td>{{$item->isi_laporan}}</td>
                                    <td><img src="{{asset('img/pengaduan/'.$item->foto)}}" alt=""></td>
                                    <td>{{$item->status}}</td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/printpage.js')}}"></script>
</body>
</html>
