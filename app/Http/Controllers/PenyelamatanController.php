<?php

namespace App\Http\Controllers;

use App\Models\Penyelamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenyelamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penyelamatan.index', [
            'page_title' => 'Data Penyelamatan',
            'data_penyelamatan' => Penyelamatan::orderByDesc('created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyelamatan.tambah', [
            'page_title' => 'Tambah Data Penyelamatan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|max:255',
            'jenis' => 'required|max:255',
            'pelapor' => 'nullable|max:255',
            'armada' => 'required|max:255',
            'anggota' => 'required|max:255',
            'foto' => 'required|image|mimes:jpg,png'
        ]);

        $validated['foto'] = $request->file('foto')->store('dokumentasi');

        Penyelamatan::create($validated);
        return redirect()->route('penyelamatan.index')->with('success', 'Data berhasil ditambah');
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
    public function edit(Penyelamatan $penyelamatan)
    {
        return view('penyelamatan.edit', [
            'page_title' => 'Edit Data Penyelamatan',
            'penyelamatan' => $penyelamatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|max:255',
            'jenis' => 'required|max:255',
            'pelapor' => 'nullable|max:255',
            'armada' => 'required|max:255',
            'anggota' => 'required|max:255',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = 'required|image|mimes:jpg,png';
            $validated['foto'] = $request->file('foto')->store('dokumentasi');
            Storage::delete($request->old_foto);
        }


        Penyelamatan::find($id)->update($validated);
        return redirect()->route('penyelamatan.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyelamatan $penyelamatan)
    {
        Penyelamatan::where('id', $penyelamatan->id)->delete();
        Storage::delete($penyelamatan->foto);
        return redirect()->route('penyelamatan.index')->with('success', 'Data berhasil dihapus');
    }

    public function printAll()
    {
        return view('penyelamatan.print', [
            'page_title' => 'Data Penyelamatan',
            'data_penyelamatan' => Penyelamatan::orderByDesc('created_at')->get()
        ]);
    }

    public function print(Penyelamatan $penyelamatan)
    {
        return view('penyelamatan.print', [
            'page_title' => 'Data Penyelamatan',
            'penyelamatan' => $penyelamatan
        ]);
    }
}
