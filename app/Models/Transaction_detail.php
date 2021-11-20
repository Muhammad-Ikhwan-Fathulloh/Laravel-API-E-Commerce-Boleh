<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction_detail extends Model
{
    use HasFactory;

    public function allData(){
        return DB::table('transaction_details')
            ->orderBy('transaction_detail_id', 'DESC')
            ->get();
    }

    public function allDatas($transaction_detail_id){
        return DB::table('transaction_details')
            ->where('transaction_detail_id', $transaction_detail_id)
            ->orderBy('transaction_detail_id', 'DESC')
            ->get();
    }

    public function detailData($transaction_detail_id){
        return DB::table('transaction_details')->where('transaction_detail_id', $transaction_detail_id)->first();
    }

    public function addData($data){
        return DB::table('transaction_details')->insert($data);
    }

    public function editData($transaction_detail_id, $data){
        return DB::table('transaction_details')
        ->where('transaction_detail_id', $transaction_detail_id)
        ->update($data);
    }

    public function deleteData($transaction_detail_id){
        return DB::table('transaction_details')
        ->where('transaction_detail_id', $transaction_detail_id)
        ->delete();
    }
}
