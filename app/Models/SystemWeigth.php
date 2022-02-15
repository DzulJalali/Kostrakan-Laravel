<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemWeigth extends Model
{
    protected $table = 'system_weigth';
    protected $fillable = ['id', 'tipe', 'kk', 'ruangan', 'lantai', 'fasilitas'];
}
