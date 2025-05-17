<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Kebakaran extends Model
{
    use HasFactory;

    protected $table = 'kebakaran';

    protected $guarded = ['id'];

    public function scopeFilter($query)
    {
        if (request('bulan') ?? false) {
            $query->whereMonth('tanggal', request('bulan'));
        }

        if (request('tahun') ?? false) {
            $query->whereYear('tanggal', request('tahun'));
        }

        return $query;
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan');
    }

    public function kerugian()
    {
        return $this->hasOne(Kerugian::class, 'id_kebakaran');
    }

    public function keterangan()
    {
        return $this->hasOne(Keterangan::class, 'id_kebakaran');
    }

    public function laporan()
    {
        return $this->hasOne(Laporan::class, 'id_kebakaran');
    }

    public function hasil()
    {
        return $this->hasOne(Hasil::class, 'id_kebakaran');
    }
}
