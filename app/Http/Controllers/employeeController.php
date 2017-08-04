<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurir = Kurir::get();
        return response()->json($kurir->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $kurir = new Kurir();
          $kurir->nama = $request->input('nama');
          $kurir->nomor_telepon = $request->input('nomor_telepon');
          $kurir->alamat = $request->input('alamat');
          $kurir->ktp = $request->input('ktp');
          $kurir->jenis_kelamin = $request->input('jenis_kelamin');
          $kurir->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $kurir = Kurir::find($id);
        return response()->json($kurir->toArray());
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
    public function update(Request $request, $id)
    {
          $kurir = Kurir::find($id);
          $kurir->nama = $request->input('nama');
          $kurir->nomor_telepon = $request->input('nomor_telepon');
          $kurir->alamat = $request->input('alamat');
          $kurir->ktp = $request->input('ktp');
          $kurir->jenis_kelamin = $request->input('jenis_kelamin');
          $kurir->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kurir = Kurir::find($id);
        $kurir->delete();
        return "deleted";
    }
}
