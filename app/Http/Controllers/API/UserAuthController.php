<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserAuthController extends Controller
{
    public function auth(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah user ada dan password cocok
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Email atau password salah',
            ], 401);
        }

        // Return data user tanpa token
        return response()->json([
            'status' => true,
            'message' => 'Login berhasil',
            'user' => [
                'id' => $user->id,
                'nama' => $user->nama,
                'email' => $user->email,
                'hak_akses' => $user->hak_akses,
                // tambahkan data lain kalau perlu
            ]
        ]);
    }

    public function me(Request $request)
    {
        $userId = $request->input('user_id');

        $user = \DB::table('users')->where('id', $userId)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data user login',
            'user' => [
                'id' => $user->id,
                'name' => $user->nama,
                'username' => $user->email,
                'nik' => $user->nip_nik,
                'phone' => $user->no_telp,
                'role' => $user->hak_akses,
            ]
        ]);
    }
}
