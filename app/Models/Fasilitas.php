<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Fasilitas extends Model
{
    protected $fillable = [
        'nama_fasilitas',
        'keterangan',
    ];

    protected $primaryKey = 'fasilitas_id';

}

