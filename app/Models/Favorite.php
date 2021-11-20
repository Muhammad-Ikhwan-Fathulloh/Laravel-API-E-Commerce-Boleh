<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Favorite extends Model
{
    use HasFactory;

    public function allData(){
        return DB::table('favorites')
            ->orderBy('favorite_id', 'DESC')
            ->get();
    }

    public function allDatas($favorite_id){
        return DB::table('favorites')
            ->where('favorite_id', $favorite_id)
            ->orderBy('favorite_id', 'DESC')
            ->get();
    }

    public function detailData($favorite_id){
        return DB::table('favorites')->where('favorite_id', $favorite_id)->first();
    }

    public function addData($data){
        return DB::table('favorites')->insert($data);
    }

    public function editData($favorite_id, $data){
        return DB::table('favorites')
        ->where('favorite_id', $favorite_id)
        ->update($data);
    }

    public function deleteData($favorite_id){
        return DB::table('favorites')
        ->where('favorite_id', $favorite_id)
        ->delete();
    }
}
