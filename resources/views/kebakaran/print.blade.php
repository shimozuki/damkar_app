<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page_title }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .yth {
            position: relative;
        }

        .yth::before {
            content: 'Yth.';
            position: absolute;
            left: -2em;
        }

        .ttd {
            max-width: 300px;
            margin-top: 5rem;
            margin-left: auto;
        }

        .ttd-h4 {
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            letter-spacing: -.5px
        }

        .ttd-h4.nama {
            border-bottom: 1px solid black;
        }

        .nip {
            display: block;
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="container"
        style="color:black;font-family: 'Times New Roman', serif; margin-top: 2rem; font-size: 1.1rem">
        <div class="row mt-4">
            <div class="col-md-12">

                @php
                    $tanggal = \Carbon\Carbon::parse($kebakaran->tanggal)->locale('id');
                    $tgl_buat = \Carbon\Carbon::parse($kebakaran->laporan->tgl_buat)->locale('id');
                    $now = \Carbon\Carbon::now()->locale('id');
                    $waktu_mulai = \Carbon\Carbon::parse($kebakaran->waktu_mulai)->locale('id');
                    $waktu_selesai = \Carbon\Carbon::parse($kebakaran->waktu_selesai)->locale('id');
                    $pemilik_arr = explode(',', $kebakaran->pemilik);
                @endphp

                {{-- COP --}}
                <div class="row align-items-center">
                    <div class="col">
                        <img src="{{ asset('storage/img/kota-bengkulu.png') }}" alt="Kota Bengkulu.png"
                            class="img-fluid" style="max-width:120px" />
                    </div>
                    <div class="col-10">
                        <div style="transform: translateX(-2rem)">
                            <h3 class="text-center">PEMERINTAH KOTA BENGKULU</h3>
                            <h2 class="text-center font-weight-bold">DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN</h2>
                            <!-- <h1 class="text-center">KELURAHAN TENGAH PADANG</h1> -->
                            <p class="text-center">Jln.Bhayangkara No.47 Km.9 Telp. (0736) 5523 - 003 Call
                                Center.0811-7351-113</p>
                        </div>

                    </div>
                </div>

                <div class="line" style="margin-top: -1rem">
                    <hr style="border:3px solid #000">
                    <hr style="border:.5px solid #000; margin-top: -15px">
                </div>

                {{-- PERIHAL --}}
                <div class="row">
                    <div class="col">
                        <table cellspacing="0">
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td>{{ $kebakaran->laporan->nomor }}</td>
                            </tr>
                            <tr>
                                <td>Sifat</td>
                                <td>:</td>
                                <td>{{ $kebakaran->laporan->sifat }}</td>
                            </tr>
                            <tr>
                                <td>Lampiran</td>
                                <td>:</td>
                                <td>{{ $kebakaran->laporan->lampiran ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td>:</td>
                                <td><strong>{{ $kebakaran->laporan->perihal }}</strong></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col">
                        <div style="margin-left: 5rem">
                            <span class="d-block">Bengkulu, {{ $tgl_buat->translatedFormat('d M Y') }}</span>
                            <br>
                            <span>Kepada</span>
                            <br>
                            <span class="yth">Bapak Walikota Bengkulu</span>
                            <span>Cq. Asisten I Sekretariat Daerah Kota Bengkulu di-</span>
                        </div>
                    </div>
                </div>

                {{-- ISI --}}
                <div class="row justify-content-center" style="margin-top: 5rem">
                    <div class="col-md-8">
                        <table cellpadding="1" border="0" width="100%">
                            <tr>
                                <td>1.</td>
                                <td>Hari / Tanggal</td>
                                <td>:</td>
                                <td>{{ $tanggal->translatedFormat('l, d M Y') }}</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Terima Laporan Dari</td>
                                <td>:</td>
                                <td>{{ $kebakaran->pelapor }}</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $kebakaran->alamat }}</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Jenis yang terbakar</td>
                                <td>:</td>
                                <td>{{ $kebakaran->jenis }}</td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Pemilik / Penghuni</td>
                                <td>:</td>
                                <td>
                                    <ol>
                                        @foreach ($pemilik_arr as $pemilik)
                                            <li>{{ $pemilik }}</li>
                                        @endforeach
                                    </ol>
                                </td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Wilayah / Bagian yang terbakar</td>
                                <td>:</td>
                                <td>{{ $kebakaran->wilayah }}</td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>Waktu Kejadian</td>
                                <td>:</td>
                                <td>{{ $waktu_mulai->translatedFormat('h:i') }} wib s/d
                                    {{ $waktu_selesai->translatedFormat('h:i') }} wib</td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>Hasil Penanggulangan kebakaran</td>
                                <td>:</td>
                                <td>{{ $kebakaran->hasil->hasil }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>a. Yang Melaksanan Tugas</td>
                                <td>:</td>
                                <td>{{ $kebakaran->hasil->pelaksana }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>b. Kendaraan / No. Pintu</td>
                                <td>:</td>
                                <td>{{ $kebakaran->hasil->kendaraan }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>c. Instansi Yang Membantu</td>
                                <td>:</td>
                                <td>{{ $kebakaran->hasil->instansi }}</td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td>Asal Api</td>
                                <td>:</td>
                                <td>{{ $kebakaran->asal_api }}</td>
                            </tr>
                            <tr>
                                <td>10.</td>
                                <td>Satuan Pemadam Kebakaran Kembali ke Pangkalan</td>
                                <td>:</td>
                                <td>{{ $kebakaran->spk_kembali }}</td>
                            </tr>
                            <tr>
                                <td>11.</td>
                                <td>Taksiran Kerugian</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>a. Korban Manusia / Luka Bakar</td>
                                <td>:</td>
                                <td>{{ $kebakaran->kerugian->korban_manusia }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>b. Benda</td>
                                <td>:</td>
                                <td>{{ $kebakaran->kerugian->benda }}</td>
                            </tr>
                            <tr>
                                <td>12.</td>
                                <td>Keterangan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>a. Anggota</td>
                                <td>:</td>
                                <td>{{ $kebakaran->keterangan->anggota }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>b. Armada</td>
                                <td>:</td>
                                <td>{{ $kebakaran->keterangan->armada }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>c. Respon Time</td>
                                <td>:</td>
                                <td>{{ $kebakaran->keterangan->respon_time }}</td>
                            </tr>
                        </table>
                    </div>


                    <p class="my-5">Demikian laporan ini disampaikan kepada Bapak, atas perhatiannya terimakasih.
                    </p>

                    <div class="row" style="margin-top: 5rem">
                        <div class="col">
                            <div class="ttd">
                                <h4 class="ttd-h4">
                                    KEPALA DINAS
                                    PEMADAM KEBAKARAN DAN
                                    PENYELAMATAN KOTA
                                    BENGKULU
                                </h4>
                                <br><br><br>
                                <h4 class="ttd-h4 nama">YULIANSYAH, SE., MM</h4>
                                <label for="" class="nip">Nip. 197206051993031006</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script>
        window.print();
    </script>
</body>

</html>
