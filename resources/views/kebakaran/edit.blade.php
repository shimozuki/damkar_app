@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <form action="{{ route('kebakaran.update', $kebakaran->id) }}" method="POST">
                @csrf
                @method('PATCH')
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
                                        name="tanggal" placeholder="Hari/Tanggal"
                                        value="{{ old('tanggal', $kebakaran->tanggal) }}">
                                    @error('tanggal')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pelapor">Terima Laporan Dari</label>
                                    <input type="text" class="form-control @error('pelapor') is-invalid @enderror"
                                        name="pelapor" placeholder="Pelapor"
                                        value="{{ old('pelapor', $kebakaran->pelapor) }}">
                                    @error('pelapor')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror"
                                        name="jenis" placeholder="Jenis yang terbakar"
                                        value="{{ old('jenis', $kebakaran->jenis) }}">
                                    @error('jenis')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pemilik">Pemilik / Penghuni</label>
                                    <input type="text" class="form-control @error('pemilik') is-invalid @enderror"
                                        name="pemilik" placeholder="Pemilik"
                                        value="{{ old('pemilik', $kebakaran->pemilik) }}">
                                    @error('pemilik')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="wilayah">Wilayah / Bagian Yang Terbakar</label>
                                    <input type="text" class="form-control @error('wilayah') is-invalid @enderror"
                                        name="wilayah" placeholder="Wilayah"
                                        value="{{ old('wilayah', $kebakaran->wilayah) }}">
                                    @error('wilayah')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="waktu_mulai">Waktu Kejadian</label>
                                    <div class="row">
                                        <div class="col">
                                            <input type="datetime-local"
                                                class="form-control @error('waktu_mulai') is-invalid @enderror"
                                                name="waktu_mulai"
                                                value="{{ old('waktu_mulai', $kebakaran->waktu_mulai) }}">
                                            @error('waktu_mulai')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="datetime-local"
                                                class="form-control @error('waktu_selesai') is-invalid @enderror"
                                                name="waktu_selesai"
                                                value="{{ old('waktu_selesai', $kebakaran->waktu_selesai) }}">
                                            @error('waktu_selesai')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="asal_api">Asal Api</label>
                                    <select name="asal_api" id="asal_api"
                                        class="form-control @error('asal_api') is-invalid @enderror">
                                        <option value="Belum diketahui">Belum diketahui</option>
                                        <option value="Konsleting listrik">Konsleting listrik</option>
                                        <option value="Kompor gas">Kompor gas</option>
                                    </select>
                                    {{-- <input type="text" class="form-control @error('asal_api') is-invalid @enderror"
                                        name="asal_api" placeholder="Asal Api" value="{{ old('asal_api') }}"> --}}
                                    @error('asal_api')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select name="id_kecamatan" id="kecamatan"
                                        class="form-control @error('id_kecamatan') is-invalid @enderror">
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach ($kecamatan as $kec)
                                            <option value="{{ $kec->id }}"
                                                {{ old('id_kecamatan', $kebakaran->id_kecamatan) == $kec->id ? 'selected' : '' }}>
                                                {{ $kec->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kecamatan')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan</label>
                                    <select name="id_kelurahan" id="kelurahan"
                                        class="form-control @error('id_kelurahan') is-invalid @enderror">
                                        <option value="">Pilih Kelurahan</option>
                                    </select>
                                    @error('id_kelurahan')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror"
                                        placeholder="Alamat">{{ old('alamat', $kebakaran->alamat) }}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="hasil">Hasil</label>
                                    <textarea name="hasil" id="hasil" rows="3" class="form-control @error('hasil') is-invalid @enderror"
                                        placeholder="Hasil penanggulangan kebakaran">{{ old('hasil', $kebakaran->hasil->hasil) }}</textarea>
                                    @error('hasil')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <ol>
                                        <li class="mb-3">
                                            <label for="pelaksana">Yang Melaksanakan Tugas</label>
                                            <textarea name="pelaksana" id="pelaksana" rows="2"
                                                class="form-control @error('pelaksana') is-invalid @enderror" placeholder="Pelaksana">{{ old('pelaksana', $kebakaran->hasil->pelaksana) }}</textarea>
                                            @error('pelaksana')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </li>
                                        <li class="mb-3">
                                            <label for="kendaraan">Kendaraan / No. Pintu</label>
                                            <textarea name="kendaraan" id="kendaraan" rows="2"
                                                class="form-control @error('kendaraan') is-invalid @enderror" placeholder="Kendaraan">{{ old('kendaraan', $kebakaran->hasil->kendaraan) }}</textarea>
                                            @error('kendaraan')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </li>
                                        <li class="mb-3">
                                            <label for="">Instansi Yang Membantu</label>
                                            <textarea name="instansi" id="instansi" rows="2"
                                                class="form-control @error('instansi') is-invalid @enderror" placeholder="Instansi">{{ old('instansi', $kebakaran->hasil->instansi) }}</textarea>
                                            @error('respon_time')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="spk_kembali">SPK Kembali</label>
                                    <input type="time" class="form-control @error('spk_kembali') is-invalid @enderror"
                                        name="spk_kembali" value="{{ old('spk_kembali', $kebakaran->spk_kembali) }}">
                                    @error('spk_kembali')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="">Taksiran Kerugian</label>
                                    <ul>
                                        <li class="mb-3">
                                            <label for="">Korban Manusia</label>
                                            <input type="text"
                                                class="form-control @error('korban_manusia') is-invalid @enderror"
                                                name="korban_manusia" placeholder="Korban Manusia"
                                                value="{{ old('korban_manusia', $kebakaran->kerugian->korban_manusia) }}">
                                            @error('korban_manusia')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </li>
                                        <li class="mb-3">
                                            <label for="">Benda</label>
                                            <input type="text"
                                                class="form-control @error('benda') is-invalid @enderror" name="benda"
                                                placeholder="Benda"
                                                value="{{ old('benda', $kebakaran->kerugian->benda) }}">
                                            @error('benda')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <label for="">Keterangan</label>
                                    <ul>
                                        <li class="mb-3">
                                            <label for="">Anggota</label>
                                            <input type="text"
                                                class="form-control @error('anggota') is-invalid @enderror"
                                                name="anggota" placeholder="Korban Manusia"
                                                value="{{ old('anggota', $kebakaran->keterangan->anggota) }}">
                                            @error('anggota')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </li>
                                        <li class="mb-3">
                                            <label for="">Armada</label>
                                            <input type="text"
                                                class="form-control @error('armada') is-invalid @enderror" name="armada"
                                                placeholder="armada"
                                                value="{{ old('armada', $kebakaran->keterangan->armada) }}">
                                            @error('armada')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </li>
                                        <li class="mb-3">
                                            <label for="">Respon Time</label>
                                            <input type="text"
                                                class="form-control @error('respon_time') is-invalid @enderror"
                                                name="respon_time" placeholder="respon_time"
                                                value="{{ old('respon_time', $kebakaran->keterangan->respon_time) }}">
                                            @error('respon_time')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </li>
                                    </ul>
                                </div>
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
            bsCustomFileInput.init();
            const id = $('#kecamatan').val();

            $.ajax({
                url: `/api/kelurahan/${id}`,
                type: 'GET',
                success: function(data) {
                    // Menghapus opsi kelurahan sebelumnya
                    $('#kelurahan').empty();
                    $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');

                    // Menambahkan opsi kelurahan baru
                    $.each(data, function(key, value) {
                        const newOption = document.createElement('option');
                        newOption.value = value.id;
                        newOption.innerText = value.nama;

                        if ({{ $kebakaran->id_kelurahan }} == value.id) {
                            newOption.setAttribute('selected', true);
                        }

                        $('#kelurahan').append(newOption);
                    });
                }
            });
        });

        $('#kecamatan').on('change', function() {
            const id = this.value;

            $.ajax({
                url: `/api/kelurahan/${id}`,
                type: 'GET',
                success: function(data) {
                    // Menghapus opsi kelurahan sebelumnya
                    $('#kelurahan').empty();
                    $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');

                    // Menambahkan opsi kelurahan baru
                    $.each(data, function(key, value) {
                        $('#kelurahan').append(
                            `<option value="${value.id}">${value.nama}</option>`);
                    });
                }
            });
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
