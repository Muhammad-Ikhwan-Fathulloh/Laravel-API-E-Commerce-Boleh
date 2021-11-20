<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class Product_controller extends Controller
{
    public function __construct(){
        $this->Product = new Product();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'product' => $this->Product->allData(),
        ];

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'product_name' => $request->product_name,
            'product_stock' => $request->product_stock,
            'product_price' => $request->product_price,
            'product_weight' => $request->product_weight,
            'product_image' => $request->product_image,
            'product_origin_category' => $request->product_origin_category,
            'product_category' => $request->product_category,
            'product_favorite_status' => $request->product_favorite_status,
            'product_description' => $request->product_description,
        ];

        $this->Product->addData($data);

        return response()->json([
            "message" => "Sukses menambah data",
            "data" => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        $data = [
            'product' => $this->Product->allDatas($product_id),
        ];

        return response()->json($data);
    }
    
    public function showOrigin($product_origin_category)
    {
        $data = [
            'product' => $this->Product->allDataOrigin($product_origin_category),
        ];

        return response()->json($data);
    }
    
    public function showCategory($product_category)
    {
        $data = [
            'product' => $this->Product->allDataCategory($product_category),
        ];

        return response()->json($data);
    }
    
    public function showName($product_name)
    {
        $data = [
            'product' => $this->Product->allDataName($product_name),
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $data = [
            'product_name' => $request->product_name,
            'product_stock' => $request->product_stock,
            'product_price' => $request->product_price,
            'product_weight' => $request->product_weight,
            'product_image' => $request->product_image,
            'product_origin_category' => $request->product_origin_category,
            'product_category' => $request->product_category,
            'product_favorite_status' => $request->product_favorite_status,
            'product_description' => $request->product_description,
        ];

        $this->Product->editData($product_id, $data);

        return response()->json([
            "message" => "Sukses mengubah data",
            "data" => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $this->Product->deleteData($product_id);
        return response()->json([
            "message" => "Sukses menghapus data",
            "data" => $product_id
        ]);
    }
}
