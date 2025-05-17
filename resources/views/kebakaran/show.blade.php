@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card card-info">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="card-title">
                                {{ $page_title }}
                            </h3>
                        </div>
                        @if (!$kebakaran->laporan)
                            <div class="col">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal"
                                    data-target="#addModal">
                                    <i class="fas fa-plus"></i>
                                    Buat Laporan
                                </button>
                            </div>
                        @else
                            <a href="{{ route('kebakaran.print', $kebakaran->id) }}" class="btn btn-danger btn-sm"
                                target="_blank">
                                <i class="fas fa-print"></i>
                                Cetak Laporan
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $tanggal = \Carbon\Carbon::parse($kebakaran->tanggal)->locale('id');
                        $waktu_mulai = \Carbon\Carbon::parse($kebakaran->waktu_mulai)->locale('id');
                        $waktu_selesai = \Carbon\Carbon::parse($kebakaran->waktu_selesai)->locale('id');
                        $pemilik_arr = explode(',', $kebakaran->pemilik);
                    @endphp
                    <table cellpadding="10">
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
                            <td>{{ $kebakaran->pelapor ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td>{{ $kebakaran->kecamatan->nama }}</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Kelurahan</td>
                            <td>:</td>
                            <td>{{ $kebakaran->kelurahan->nama }}</td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $kebakaran->alamat }}</td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>Jenis yang terbakar</td>
                            <td>:</td>
                            <td>{{ $kebakaran->jenis }}</td>
                        </tr>
                        <tr>
                            <td>7.</td>
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
                            <td>8.</td>
                            <td>Wilayah / Bagian yang terbakar</td>
                            <td>:</td>
                            <td>{{ $kebakaran->wilayah }}</td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td>Waktu Kejadian</td>
                            <td>:</td>
                            <td>{{ $waktu_mulai->translatedFormat('h:i') }} wib s/d
                                {{ $waktu_selesai->translatedFormat('h:i') }} wib</td>
                        </tr>
                        <tr>
                            <td>10.</td>
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
                            <td>11.</td>
                            <td>Asal Api</td>
                            <td>:</td>
                            <td>{{ $kebakaran->asal_api }}</td>
                        </tr>
                        <tr>
                            <td>12.</td>
                            <td>Satuan Pemadam Kebakaran Kembali ke Pangkalan</td>
                            <td>:</td>
                            <td>{{ $kebakaran->spk_kembali }}</td>
                        </tr>
                        <tr>
                            <td>13.</td>
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
                            <td>14.</td>
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
            </div>
        </div>
    </div>

    @php
        $now = \Carbon\Carbon::now()->locale('id');
    @endphp

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('laporan.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Buat Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_kebakaran" value="{{ $kebakaran->id }}">
                        <div class="form-group">
                            <label for="nomor">Nomor</label>
                            <input type="text" name="nomor" class="form-control @error('nomor') is-invalid @enderror"
                                placeholder="364 / 9 / D.PKP / {{ $now->translatedFormat('Y') }}"
                                value="{{ old('nomor') }}">
                            @error('nomor')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sifat">Sifat</label>
                            <select name="sifat" id="sifat" class="form-control @error('sifat') is-invalid @enderror">
                                <option value="">Sifat Laporan</option>
                                <option value="biasa">Biasa</option>
                            </select>
                            @error('sifat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lampiran">Lampiran</label>
                            <input type="text" class="form-control @error('lampiran') is-invalid @enderror"
                                name="lampiran" placeholder="Lampiran" value="{{ old('lampiran') }}">
                            @error('lampiran')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control @error('perihal') is-invalid @enderror" name="perihal"
                                placeholder="perihal" value="{{ old('perihal') }}">
                            @error('perihal')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" target="_blank">
                            <i class="fas fa-print"></i>
                            Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            @if ($errors->any())
                $('#addModal').modal('show');
            @endif
        });
    </script>
@endpush
