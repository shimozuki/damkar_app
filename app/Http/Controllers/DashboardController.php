<?php

namespace App\Http\Controllers;

use App\Models\Kebakaran;
use App\Models\Laporan;
use App\Models\Penyelamatan;
use App\Models\Time;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bulan = Time::bulan();
        $kebakaran_chart = [];
        $penyelamatan_chart = [];

        foreach ($bulan as $index => $bln) {
            $data = Kebakaran::whereMonth('tanggal', $index + 1)->get();
            $kebakaran_chart[] = $data->count();
        }

        foreach ($bulan as $index => $bln) {
            $data = Penyelamatan::whereMonth('tanggal', $index + 1)->get();
            $penyelamatan_chart[] = $data->count();
        }

        return view('dashboard.index', [
            'page_title' => 'Dashboard',
            'bulan' => $bulan,
            'kebakaran_chart' => $kebakaran_chart,
            'penyelamatan_chart' => $penyelamatan_chart,
            'kebakaran_count' => Kebakaran::count(),
            'penyelamatan_count' => Penyelamatan::count(),
            'laporan_count' => Laporan::count()
        ]);
    }
}