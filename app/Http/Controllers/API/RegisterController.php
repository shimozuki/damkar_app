<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'nip_nik' => 'required|string|max:20|unique:users,nip_nik',
            'no_telp' => 'nullable|string|max:20',
            'hak_akses' => 'required|in:Administrator,Petugas,masyarakat',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Simpan user baru
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nip_nik' => $request->nip_nik,
            'no_telp' => $request->no_telp,
            'hak_akses' => $request->hak_akses,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Registrasi berhasil',
            'user' => $user,
        ], 201);
    }
}
