<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class Favorite_controller extends Controller
{
    public function __construct(){
        $this->Favorite = new Favorite();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'favorite' => $this->Favorite->allData(),
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
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'favorite_status' => $request->favorite_status,
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
    public function show($favorite_id)
    {
        $data = [
            'favorite' => $this->Favorite->allDatas($favorite_id),
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
    public function update(Request $request, $favorite_id)
    {
        $data = [
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'favorite_status' => $request->favorite_status,
        ];

        $this->Transaction->editData($favorite_id, $data);

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
    public function destroy($favorite_id)
    {
        $this->Favorite->deleteData($favorite_id);
        return response()->json([
            "message" => "Sukses menghapus data",
            "data" => $favorite_id
        ]);
    }
}
