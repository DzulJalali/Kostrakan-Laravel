<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Home extends Model
{
    protected $table = 'building_details';
    protected $primaryKey = 'building_id';
    
    public function getAll()
    {
        return DB::table('building_details')
                ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
                ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
                ->get();
    }

    public function cities()
    {
        return $this->hasOne(Cities::class);
    }

    public function buildingtypes()
    {
        return $this->hasOne(BuildingTypes::class);
    }
}
