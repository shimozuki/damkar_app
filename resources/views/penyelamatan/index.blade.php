@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ $page_title }}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col">
                            <a href="{{ route('penyelamatan.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                            <a href="{{ route('penyelamatan.printAll') }}" target="_blank" class="btn btn-info btn-sm">
                                <i class="fas fa-print"></i>
                                Cetak Semua
                            </a>
                        </div>
                    </div>
                    <table class="table table-bordered responsive-table" id="table">
                        <thead class="bg-dark">
                            <tr>
                                <th style="width: 15px">No</th>
                                <th>Deskripsi</th>
                                <th style="width: 300px">Dokumentasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_penyelamatan as $penyelamatan)
                                <tr>
                                    <td width="10px">{{ $loop->iteration }}.</td>
                                    <td>
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
                                        <div class="row mt-4">
                                            <div class="col">
                                                <a href="{{ route('penyelamatan.edit', $penyelamatan->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('penyelamatan.destroy', $penyelamatan->id) }}"
                                                    class="d-inline-block" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                                <a href="{{ route('penyelamatan.print', $penyelamatan->id) }}"
                                                    class="btn btn-info btn-sm" target="_blank">
                                                    <i class="fas fa-print"></i>
                                                    Cetak
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <img class="img-fluid" style="max-height:250px"
                                            src="{{ asset('storage/' . $penyelamatan->foto) }}" alt="Dokumentasi">
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
