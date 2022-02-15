<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class BuildingTypes extends Model
{
    protected $fillable = [
        'nama_tipe',
    ];

    protected $primaryKey = 'tipe_id';

    public function getAll(){
        return DB::table('building_types')->select('*')->get();
    }

    public function building_types()
    {
    	return $this->hasOne(BuildingDetails::class);
    }
}
