<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public function allData(){
        return DB::table('products')
            ->orderBy('product_id', 'DESC')
            ->get();
    }

    public function allDatas($product_id){
        return DB::table('products')
            ->where('product_id', $product_id)
            ->orderBy('product_id', 'DESC')
            ->get();
    }

    public function allDataOrigin($product_origin_category){
        return DB::table('products')
            ->where('product_origin_category', $product_origin_category)
            ->orderBy('product_id', 'DESC')
            ->get();
    }

    public function allDataCategory($product_category){
        return DB::table('products')
            ->where('product_category', $product_category)
            ->orderBy('product_id', 'DESC')
            ->get();
    }

    public function allDataName($product_name){
        return DB::table('products')
            ->where('product_name', $product_name)
            ->orderBy('product_id', 'DESC')
            ->get();
    }

    public function detailData($product_id){
        return DB::table('products')->where('product_id', $product_id)->first();
    }

    public function addData($data){
        return DB::table('products')->insert($data);
    }

    public function editData($product_id, $data){
        return DB::table('products')
        ->where('product_id', $product_id)
        ->update($data);
    }

    public function deleteData($product_id){
        return DB::table('products')
        ->where('product_id', $product_id)
        ->delete();
    }
}
