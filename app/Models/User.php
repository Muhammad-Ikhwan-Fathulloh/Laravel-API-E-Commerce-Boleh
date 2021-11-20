<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function allData(){
        return DB::table('users')
            ->orderBy('user_id', 'DESC')
            ->get();
    }

    public function allDatas($user_id){
        return DB::table('users')
            ->where('user_id', $user_id)
            ->orderBy('user_id', 'DESC')
            ->get();
    }

    public function detailData($user_id){
        return DB::table('users')->where('user_id', $user_id)->first();
    }

    public function addData($data){
        return DB::table('users')->insert($data);
    }

    public function editData($user_id, $data){
        return DB::table('users')
        ->where('user_id', $user_id)
        ->update($data);
    }

    public function deleteData($user_id){
        return DB::table('users')
        ->where('user_id', $user_id)
        ->delete();
    }
}
