<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'page_title' => 'Nama Pengguna',
            'data_user' => User::orderByDesc('created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'no_telp' => 'required|numeric',
            'nip_nik' => 'required|numeric',
            'hak_akses' => 'required',
            'password' => 'required'
        ]);

        $validated['password'] = bcrypt($request->password);

        User::create($validated);

        return redirect()->back()->with('success', 'Data pengguna berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama' => 'required',
            'no_telp' => 'required|numeric',
            'nip_nik' => 'required|numeric',
            'hak_akses' => 'required',
            'password' => 'nullable'
        ];

        if ($request->email !== User::find($id)->pluck('email')) {
            $rules['email'] = 'required|email|unique:users';
        }

        $validated = $request->validate($rules);
        $validated['password'] = bcrypt($request->password);

        User::find($id)->update($validated);

        return redirect()->back()->with('success', 'Data pengguna berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();

        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus');
    }
}
