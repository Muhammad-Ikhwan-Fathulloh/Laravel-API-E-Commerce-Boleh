<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class Transaction_controller extends Controller
{
    public function __construct(){
        $this->Transaction = new Transaction();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'transaction' => $this->Transaction->allData(),
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
            'user_id' => $request->user_id,
            'transaction_status' => $request->transaction_status,
            'transaction_confirm' => $request->transaction_confirm,
            'transaction_total_price' => $request->transaction_total_price,
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
    public function show($transaction_id)
    {
        $data = [
            'transaction' => $this->Transaction->allDatas($transaction_id),
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
    public function update(Request $request, $transaction_id)
    {
        $data = [
            'user_id' => $request->user_id,
            'transaction_status' => $request->transaction_status,
            'transaction_confirm' => $request->transaction_confirm,
            'transaction_total_price' => $request->transaction_total_price,
        ];

        $this->Transaction->editData($transaction_id, $data);

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
    public function destroy($transaction_id)
    {
        $this->Transaction->deleteData($transaction_id);
        return response()->json([
            "message" => "Sukses menghapus data",
            "data" => $transaction_id
        ]);
    }
}
