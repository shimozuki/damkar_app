<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    protected $guarded = ['id'];

    public function scopeFilter($query)
    {
        if (request('bulan') ?? false) {
            $query->whereMonth('created_at', request('bulan'));
        }

        if (request('tahun') ?? false) {
            $query->whereYear('created_at', request('tahun'));
        }

        return $query;
    }

    public function kebakaran()
    {
        return $this->belongsTo(Kebakaran::class, 'id_kebakaran');
    }
}