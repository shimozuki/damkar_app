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
                    <form action="{{ route('laporan.penyelamatanByDate') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="">Pilih Bulan</option>
                                        <option value="january">Januari</option>
                                        <option value="february">Februari</option>
                                        <option value="march">Maret</option>
                                        <option value="april">April</option>
                                        <option value="may">Mei</option>
                                        <option value="june">Juni</option>
                                        <option value="july">Juli</option>
                                        <option value="august">Agustus</option>
                                        <option value="september">September</option>
                                        <option value="octover">Oktober</option>
                                        <option value="november">November</option>
                                        <option value="december">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    @php
                                        $tahunSekarang = date('Y');
                                        $tahunAwal = 2018; // Tahun awal yang Anda inginkan
                                    @endphp
                                    <label for="tahun">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option value="">Pilih Tahun</option>
                                        @for ($tahun = $tahunAwal; $tahun <= $tahunSekarang; $tahun++)
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-print"></i>
                            Cetak
                        </button>
                    </form>
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
