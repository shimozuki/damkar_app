@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <form action="{{ route('penyelamatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{ $page_title }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal">Hari / Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                        name="tanggal" placeholder="Hari/Tanggal" value="{{ old('tanggal') }}">
                                    @error('tanggal')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Pukul</label>
                                    <input type="time" class="form-control @error('waktu') is-invalid @enderror"
                                        name="waktu" placeholder="Pukul" value="{{ old('waktu') }}">
                                    @error('waktu')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                        name="lokasi" placeholder="Lokasi" value="{{ old('lokasi') }}">
                                    @error('lokasi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis Kegiatan</label>
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror"
                                        name="jenis" placeholder="Jenis kegiatan" value="{{ old('jenis') }}">
                                    @error('jenis')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pelapor">Pelapor</label>
                                    <input type="text" class="form-control @error('pelapor') is-invalid @enderror"
                                        name="pelapor" placeholder="Pelapor" value="{{ old('pelapor') }}">
                                    @error('pelapor')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="armada">Armada</label>
                                    <input type="text" class="form-control @error('armada') is-invalid @enderror"
                                        name="armada" placeholder="Armada" value="{{ old('armada') }}">
                                    @error('armada')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="anggota">Anggota</label>
                                    <input type="text" class="form-control @error('anggota') is-invalid @enderror"
                                        name="anggota" placeholder="Anggota" value="{{ old('anggota') }}">
                                    @error('anggota')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('foto') is-invalid @enderror" name="foto"
                                                id="foto">
                                            <label class="custom-file-label" for="foto">Pilih Foto</label>
                                        </div>
                                    </div>
                                    @error('foto')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    @error('anggota')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <img src="" id="img-preview" style="display: none; max-width: 100%">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        });

        $('#foto').on('change', function(e) {
            const reader = new FileReader();

            reader.onload = function(e) {
                $('#img-preview').attr('src', e.target.result);
                $('#img-preview').css('display', 'block');
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
@endpush
