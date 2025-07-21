<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Kebakaran;
use App\Models\Penyelamatan;

class LaporanController extends Controller
{
    public function laporan(Request $request)
    {
        $request->validate([
            'jenis_bencana' => 'required|string',
            'status' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;

        if ($request->hasFile('foto')) {
            $filename = 'laporan_' . Str::random(10) . '.' . $request->foto->extension();
            $path = $request->file('foto')->storeAs('public/laporan', $filename);
        }

        // Data Umum dari Flutter
        $data = [
            'status' => $request->status ?? 'laporan baru',
            'deskripsi' => $request->deskripsi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'foto' => $path ? basename($path) : null,
        ];

        if (strtolower($request->jenis_bencana) == 'kebakaran') {
            $laporan = Kebakaran::create(array_merge($data, [
                'pelapor' => '-',
                'alamat' => '-',
                'tanggal' => now()->format('Y-m-d'),
                'wilayah' => '-',
            ]));
        } else {
            $laporan = Penyelamatan::create(array_merge($data, [
                'pelapor' => '-',
                'lokasi' => '-',
                'tanggal' => now()->format('Y-m-d'),
                'jenis' => $request->jenis_bencana,
                'anggota' => '-',
                'armada' => '-',
                'waktu' => now()->format('H:i:s'),
            ]));
        }

        return response()->json([
            'status' => true,
            'message' => 'Laporan berhasil ditambahkan',
            'data' => $laporan
        ]);
    }
}
