<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  /**
    * @SWG\Get(
    *   path="/api/admin/item",
    *   summary="Retrieve item resources. ",
    *   produces={"application/json"},
    *   tags={"Admin Item"},
    *   @SWG\Response(
    *       response=200,
    *       description= "Item collection.",
    *       @SWG\Schema(
    *           type="array",
    *           @SWG\Items(ref="#/definitions/item")
    *           )
    *   ),
    *   @SWG\Response(
    *       response=401,
    *       description="Unauthorized action.",
    *   ),
    *   @SWG\Parameter(
    *       name="Authorization",
    *       in="header",
    *       required=true,
    *       type="string"
    *   )
    * )
    */  
    public function index()
    {
        $bars = Item::paginate();// model name
        return response()->json($bars->toArray());
    }
    public function store(Request $request)
    {
        //
          $item = new Item();
          $item->no_resi = $request->input('no_resi');
          $item->nama_penerima = $request->input('nama_penerima');
          $item->alamat_penerima = $request->input('alamat_penerima');
          $item->nomor_telepon_penerima = $request->input('nomor_telepon_penerima');
          $item->id_pengantar = null;
          $item->berat = $request->input('berat');
          $item->biaya = $request->input('biaya');
          $item->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $item = Item::find($id);
        $item->id_pengantar = $request->input('id_pengantar');
        $item->save();
    }


}
