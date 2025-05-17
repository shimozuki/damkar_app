<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page_title }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .icon-container {
            position: relative;
        }

        .arrow-icon {
            position: absolute;
            top: 0;
            right: 2rem;
            width: 90px;
            opacity: .8;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <h1 class="text-center my-4 h2">{{ $page_title }}</h1>
    <div class="row justify-content-center">
        <div class="col-10">
            <table class="table table-bordered responsive-table" id="table">
                <thead>
                    <tr>
                        @if (isset($data_penyelamatan))
                            <th style="width: 15px">No</th>
                        @endif
                        <th>Deskripsi</th>
                        <th style="width: 300px">Dokumentasi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($data_penyelamatan))
                        @foreach ($data_penyelamatan as $penyelamatan)
                            <tr>
                                <td width="10px">{{ $loop->iteration }}.</td>
                                <td>
                                    <div class="icon-container">
                                        <img class="arrow-icon" src="{{ asset('storage/img/arrow-right.png') }}"
                                            alt="Arrow">
                                    </div>
                                    <div class="row">
                                        <div class="col">Hari/Tanggal</div>
                                        <div>:</div>
                                        @php
                                            $date = \Carbon\Carbon::parse($penyelamatan->tanggal)->locale('id');
                                            // var_dump($date);
                                        @endphp
                                        <div class="col-9"> {{ $date->translatedFormat('l, d M Y') }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Pukul</div>
                                        <div>:</div>
                                        <div class="col-9">{{ $penyelamatan->waktu }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">Lokasi</div>
                                        <div>:</div>
                                        <div class="col-9">{{ $penyelamatan->lokasi }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Jenis Kegiatan</div>
                                        <div>:</div>
                                        <div class="col-9">{{ $penyelamatan->jenis }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Pelapor</div>
                                        <div>:</div>
                                        <div class="col-9">{{ $penyelamatan->pelapor }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Armada</div>
                                        <div>:</div>
                                        <div class="col-9">{{ $penyelamatan->armada }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Anggota</div>
                                        <div>:</div>
                                        <div class="col-9">{{ $penyelamatan->anggota }}</div>
                                    </div>
                                </td>
                                <td>
                                    <img class="img-fluid" style="max-height:250px"
                                        src="{{ asset('storage/' . $penyelamatan->foto) }}" alt="Dokumentasi">
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            {{-- <td width="10px">{{ $loop->iteration }}.</td> --}}
                            <td>
                                <div class="icon-container">
                                    <img class="arrow-icon" src="{{ asset('storage/img/arrow-right.png') }}"
                                        alt="Arrow">
                                </div>
                                <div class="row">
                                    <div class="col">Hari/Tanggal</div>
                                    <div>:</div>
                                    @php
                                        $date = \Carbon\Carbon::parse($penyelamatan->tanggal)->locale('id');
                                        // var_dump($date);
                                    @endphp
                                    <div class="col-9"> {{ $date->translatedFormat('l, d M Y') }}</div>
                                </div>
                                <div class="row">
                                    <div class="col">Pukul</div>
                                    <div>:</div>
                                    <div class="col-9">{{ $penyelamatan->waktu }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">Lokasi</div>
                                    <div>:</div>
                                    <div class="col-9">{{ $penyelamatan->lokasi }}</div>
                                </div>
                                <div class="row">
                                    <div class="col">Jenis Kegiatan</div>
                                    <div>:</div>
                                    <div class="col-9">{{ $penyelamatan->jenis }}</div>
                                </div>
                                <div class="row">
                                    <div class="col">Pelapor</div>
                                    <div>:</div>
                                    <div class="col-9">{{ $penyelamatan->pelapor }}</div>
                                </div>
                                <div class="row">
                                    <div class="col">Armada</div>
                                    <div>:</div>
                                    <div class="col-9">{{ $penyelamatan->armada }}</div>
                                </div>
                                <div class="row">
                                    <div class="col">Anggota</div>
                                    <div>:</div>
                                    <div class="col-9">{{ $penyelamatan->anggota }}</div>
                                </div>
                            </td>
                            <td>
                                <img class="img-fluid" style="max-height:250px"
                                    src="{{ asset('storage/' . $penyelamatan->foto) }}" alt="Dokumentasi">
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <script>
        window.print();
    </script>

</body>

</html>
