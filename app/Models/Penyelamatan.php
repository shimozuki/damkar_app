<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyelamatan extends Model
{
    use HasFactory;

    protected $table = 'penyelamatan';

    protected $guarded = ['id'];
}