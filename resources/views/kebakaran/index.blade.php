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
                    <a href="{{ route('kebakaran.create') }}" class="btn btn-primary btn-sm mb-4">Tambah Data</a>

                    <table class="table" id="table">
                        <thead class="bg-dark">
                            <tr>
                                <th style="width:15px">No</th>
                                <th>Pelapor</th>
                                <th>Jenis Yang Terbakar</th>
                                <th>Alamat</th>
                                <th>Tanggal Kejadian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_kebakaran as $kebakaran)
                                @php
                                    $date = \Carbon\Carbon::parse($kebakaran->tanggal)->locale('id');
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $kebakaran->pelapor ?? '-' }}</td>
                                    <td>{{ $kebakaran->alamat }}</td>
                                    <td>{{ $kebakaran->jenis }}</td>
                                    <td>{{ $date->translatedFormat('d M Y') }}</td>
                                    <td>
                                        {{-- <a href="{{ route('kebakaran.print', $kebakaran->id) }}" class="btn btn-info btn-sm"
                                            target="_blank">
                                            <i class="fas fa-print"></i>
                                        </a> --}}
                                        <a href="{{ route('kebakaran.show', $kebakaran->id) }}" class="btn bg-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('kebakaran.edit', $kebakaran->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('kebakaran.destroy', $kebakaran->id) }}" method="POST"
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
