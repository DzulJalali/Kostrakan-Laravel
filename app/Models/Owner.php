<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Owner extends Model
{
    protected $fillable = [
        'email',
        'nama',
        'no_hp',
        'nik',
        'alamat',
        'approved_status',
    ];

    protected $primaryKey = 'owner_id';

    public function getAll(){
        return DB::table('owners')->select('*')->whereNotNull('approved_status') ->get();
    }

    public function ownerById($id, $data)
    {
        $owner = DB::table('owners')->select('*')->where('owner_id', $id)->update($data);
    }

    public function storePemilik($data)
    {
        DB::table('owners')->insert($data);
        
        $ownerId = DB::getPdo()->lastInsertId();
        $data2 =
        [
            'owner_id' => $ownerId,
        ];
        // dd($ownerId);
        DB::table('users')->where('user_id', Auth::user()->user_id)->update($data2);
    }

    public function approveList()
    {
        $user = DB::table('owners')->whereNull('approved_status')->get();
        return $user;
    }

}
