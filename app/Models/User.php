<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'no_hp',
        'email',
        'google_id',
        'username',
        'password',
        'profile_image',
        // 'approved_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $primaryKey = 'user_id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAll(){
        return DB::table('users')->select('*')
                ->leftjoin('owners as ow', 'users.owner_id', '=', 'ow.owner_id')->get();
    }

    public function getApprovedStatus($id)
    {
        return DB::table('users')->where('user_id', $id)
                ->leftjoin('owners as ow', 'users.owner_id', '=', 'ow.owner_id')->pluck('approved_status');
    }

    public function detailUser($id)
    {
        $detailUser = DB::table('users')->select('*')->where('user_id', $id)->first();
        return $detailUser;
    }

    public function storeUser($data)
    {
        DB::table('users')->insert($data);
    }

    public function editUser($id)
    {
        $user = DB::table('users')->select('*')->where('user_id', $id)->first();
        return $user;
    }

    public function updateUser($id, $data)
    {
        DB::table('users')->where('user_id', $id)->update($data);
    }

    public function deleteUser($id)
    {
        DB::table('users')->where('user_id', $id)->delete();
    }
    
}
