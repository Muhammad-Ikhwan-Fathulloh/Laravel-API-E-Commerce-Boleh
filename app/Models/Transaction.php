<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    public function allData(){
        return DB::table('transactions')
            ->orderBy('transaction_id', 'DESC')
            ->get();
    }

    public function allDatas($transaction_id){
        return DB::table('transactions')
            ->where('transaction_id', $transaction_id)
            ->orderBy('transaction_id', 'DESC')
            ->get();
    }

    public function detailData($transaction_id){
        return DB::table('transactions')->where('transaction_id', $transaction_id)->first();
    }

    public function addData($data){
        return DB::table('transactions')->insert($data);
    }

    public function editData($transaction_id, $data){
        return DB::table('transactions')
        ->where('transaction_id', $transaction_id)
        ->update($data);
    }

    public function deleteData($transaction_id){
        return DB::table('transactions')
        ->where('transaction_id', $transaction_id)
        ->delete();
    }
}
