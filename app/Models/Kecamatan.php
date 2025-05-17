<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'id_kecamatan');
    }

    public function kebakaran()
    {
        return $this->hasMany(Kebakaran::class, 'id_kecamatan');
    }
}
