@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{ $page_title }}</h3>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="">Pilih Bulan</option>
                                        @foreach ($bulan as $index => $bln)
                                            <option value="{{ $index + 1 }}"
                                                {{ request('bulan') == $index + 1 ? 'selected' : '' }}>{{ $bln }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option value="">Pilih tahun</option>
                                        @foreach ($tahun as $index => $thn)
                                            <option value="{{ $thn }}"
                                                {{ request('tahun') == $thn ? 'selected' : '' }}>{{ $thn }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary"
                                    style="transform: translateY(1.9em)">Cari</button>
                            </div>
                        </div>
                    </form>

                    <table class="table" id="table">
                        <thead class="bg-dark">
                            <tr>
                                <th style="width: 15px">No</th>
                                <th>Nomor</th>
                                <th>Sifat Laporan</th>
                                <th>Lampiran</th>
                                <th>Perihal</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_laporan as $laporan)
                                @php
                                    $date = \Carbon\Carbon::parse($laporan->tgl_buat)->locale('id');
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $laporan->nomor }}</td>
                                    <td>{{ $laporan->sifat }}</td>
                                    <td>{{ $laporan->lampiran ?? '-' }}</td>
                                    <td>{{ $laporan->perihal }}</td>
                                    <td>{{ $date->translatedFormat('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('kebakaran.print', $laporan->kebakaran->id) }}"
                                            class="btn btn-warning btn-sm" target="_blank">
                                            <i class="fas fa-print"></i>
                                            Cetak Laporan
                                        </a>
                                        <a href="{{ route('kebakaran.show', $laporan->kebakaran->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                            Lihat Laporan
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                ordering: false
            });
        });
    </script>
@endpush
