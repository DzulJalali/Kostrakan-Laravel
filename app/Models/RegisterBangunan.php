<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class RegisterBangunan extends Model
{
    //mengambil bangunan berdasarkan user id
    public function getBangunanByUserId()
    {
        $detailBangunan = DB::table('building_details')->select('*')->where('user_id', Auth::user()->user_id)
        ->leftjoin('building_types as bt', 'building_details.tipe_id', '=', 'bt.tipe_id')
                            ->leftjoin('cities as ct', 'building_details.kk_id', '=', 'ct.kk_id')
                            ->get();
        return $detailBangunan;
    }
}
