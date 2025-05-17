@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{ $page_title }}</h3>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#addModal">
                        <i class="fas fa-plus"></i>
                        Tambah Data
                    </button>
                    {{-- <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-4">Tambah Data</a> --}}
                    <table class="table" id="table">
                        <thead class="bg-dark">
                            <tr>
                                <th style="width:15px">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>NIP / NIK</th>
                                <th>No. Telpon</th>
                                <th>Hak Akses</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_user as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->nip_nik }}</td>
                                    <td>{{ $user->no_telp }}</td>
                                    <td>{{ $user->hak_akses }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                    {{-- Edit Modal --}}
                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('user.update', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Data Pengguna
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" name="nama"
                                                                class="form-control @error('nama') is-invalid @enderror"
                                                                placeholder="Nama Pengguna"
                                                                value="{{ old('nama', $user->nama) }}">
                                                            @error('nama')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="text" name="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                placeholder="Email"
                                                                value="{{ old('email', $user->email) }}">
                                                            @error('email')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nip_nik">NIP / NIK</label>
                                                            <input type="number"
                                                                class="form-control @error('nip_nik') is-invalid @enderror"
                                                                name="nip_nik" placeholder="nip_nik"
                                                                value="{{ old('nip_nik', $user->nip_nik) }}">
                                                            @error('nip_nik')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_telp">No. Telpon</label>
                                                            <input type="number"
                                                                class="form-control @error('no_telp') is-invalid @enderror"
                                                                name="no_telp" placeholder="Nomor Telpon"
                                                                value="{{ old('no_telp', $user->no_telp) }}">
                                                            @error('no_telp')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="hak_akses">Hak Akses</label>
                                                            <select name="hak_akses" id="hak_akses"
                                                                class="form-control @error('hak_akses') is-invalid @enderror">
                                                                <option value="">Pilih Hak Akses</option>
                                                                <option value="admin"
                                                                    {{ $user->hak_akses == 'admin' ? 'selected' : '' }}>
                                                                    Admin
                                                                </option>
                                                                <option value="super admin"
                                                                    {{ $user->hak_akses == 'super admin' ? 'selected' : '' }}>
                                                                    Super Admin</option>
                                                            </select>
                                                            @error('hak_akses')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">Ubah Password</label>
                                                            <input type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" placeholder="Password"
                                                                value="{{ old('password') }}">
                                                            @error('password')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">
                                                            Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Data Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                placeholder="Nama Pengguna" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip_nik">NIP / NIK</label>
                            <input type="number" class="form-control @error('nip_nik') is-invalid @enderror"
                                name="nip_nik" placeholder="nip_nik" value="{{ old('nip_nik') }}">
                            @error('nip_nik')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No. Telpon</label>
                            <input type="number" class="form-control @error('no_telp') is-invalid @enderror"
                                name="no_telp" placeholder="Nomor Telpon" value="{{ old('no_telp') }}">
                            @error('no_telp')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="hak_akses">Hak Akses</label>
                            <select name="hak_akses" id="hak_akses"
                                class="form-control @error('hak_akses') is-invalid @enderror">
                                <option value="">Pilih Hak Akses</option>
                                <option value="admin">Admin</option>
                                <option value="super admin">Super Admin</option>
                            </select>
                            @error('hak_akses')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">
                            Simpan</button>
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
