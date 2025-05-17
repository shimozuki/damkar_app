<?php

namespace App\Http\Controllers;

use App\Models\Kebakaran;
use App\Models\Laporan;
use App\Models\Penyelamatan;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kebakaran' => 'required',
            'nomor' => 'required',
            'sifat' => 'required',
            'lampiran' => 'nullable',
            'perihal' => 'required'
        ]);

        $validated['id_kebakaran'] = $request->id_kebakaran;
        $validated['tgl_buat'] = Carbon::now();

        Laporan::create($validated);
        // return view('kebakaran.print', [
        //     'page_title' => 'Laporan Kebakaran',
        //     'kebakaran' => Kebakaran::find($request->id_kebakaran)
        // ]);

        $print_route = "/data/print/kebakaran/$request->id_kebakaran";
        // $print_route = "{{ route('kebakaran.print', $request->id_kebakaran) }}";
        $btn = "<a href='$print_route' class='btn btn-info btn-sm'
                                            target='_blank'>
                                            <i class='fas fa-print'></i>
                                            Cetak Sekarang
                                        </a>";

        return redirect()->back()->with('success', 'Laporan berhasil dibuat, ' . $btn);
    }

    public function laporanKebakaran()
    {
        return view('laporan.kebakaran', [
            'page_title' => 'Laporan Kebakaran',
            'bulan' => Time::bulan(),
            'tahun' => Time::tahun(),
            'data_laporan' => Laporan::filter()->orderByDesc('created_at')->get()
        ]);
    }

    public function laporanPenyelamatan()
    {
        return view('laporan.penyelamatan', [
            'page_title' => 'Laporan Penyelamatan',
            'data_penyelamatan' => Penyelamatan::orderByDesc('created_at')->get()
        ]);
    }

    public function laporanPenyelamatanByDate(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $data_penyelamatan = null;

        if ($bulan && $tahun) {
            $data_penyelamatan = Penyelamatan::whereYear('tanggal', $tahun)
                ->whereMonth('tanggal', '=', date('m', strtotime($bulan)))->get();
        } elseif ($bulan) {
            $data_penyelamatan = Penyelamatan::whereMonth('tanggal', '=', date('m', strtotime($bulan)))->get();
        } elseif ($bulan) {
            $data_penyelamatan = Penyelamatan::whereYear('tanggal', $tahun);
        } else {
            return redirect()->back()->with('error', 'Silakan tentukan Bulan atau Tahun');
        }

        $bulan_translated =  Carbon::parse($bulan)->locale('id')->translatedFormat('M');
        return view('penyelamatan.print', [
            'page_title' => 'Data Penyelamatan ' . ucwords($bulan_translated) . ' ' . $tahun,
            'data_penyelamatan' => $data_penyelamatan
        ]);
    }
}
