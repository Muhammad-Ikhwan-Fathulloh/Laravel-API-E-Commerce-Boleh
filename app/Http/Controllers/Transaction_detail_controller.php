<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction_detail;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class Transaction_detail_controller extends Controller
{
    public function __construct(){
        $this->Transaction_detail = new Transaction_detail();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'transaction_detail' => $this->Transaction_detail->allData(),
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
            'transaction_id' => $request->transaction_id,
            'product_id' => $request->product_id,
            'transaction_detail_amount' => $request->transaction_detail_amount,
            'transaction_detail_total_price' => $request->transaction_detail_total_price,
        ];

        $this->Transaction->addData($data);

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
    public function show($transaction_detail_id)
    {
        $data = [
            'transaction_detail' => $this->Transaction_detail->allDatas($transaction_detail_id),
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
    public function update(Request $request, $transaction_detail_id)
    {
        $data = [
            'transaction_id' => $request->transaction_id,
            'product_id' => $request->product_id,
            'transaction_detail_amount' => $request->transaction_detail_amount,
            'transaction_detail_total_price' => $request->transaction_detail_total_price,
        ];

        $this->Transaction->editData($transaction_detail_id, $data);

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
    public function destroy($transaction_detail_id)
    {
        $this->Transaction_detail->deleteData($transaction_detail_id);
        return response()->json([
            "message" => "Sukses menghapus data",
            "data" => $transaction_detail_id
        ]);
    }
}
