<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Cities extends Model
{

    protected $fillable = [
        'nama_kk',
    ];

    protected $primaryKey = 'kk_id';

    public function getAll(){
        return DB::table('cities')->select('*')->get();
    }

    
    public function cities()
    {
    	return $this->hasOne(BuildingDetails::class);
    } 

    public function cityById($id)
    {
        $city = DB::table('cities')->select('*')->where('kk_id', $id)->first();
        return $city;
    }

    // public function detail($id)
    // {
    //     $detailUser = DB::table('users')->select('*')->where('user_id', $id)->first();
    //     return $detailUser;
    // }

    public function storeKotaKabupaten($data)
    {
        DB::table('cities')->insert($data);
    }

    public function editKotaKabupaten($id)
    {
        $kk = DB::table('cities')->select('*')->where('kk_id', $id)->first();
        return $kk;
    }

    public function updateKotaKabupaten($id, $data)
    {
        DB::table('cities')->where('kk_id', $id)->update($data);
    }

    public function deleteKotaKabupaten($id)
    {
        DB::table('cities')->where('kk_id', $id)->delete();
    }
    
}
