<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


 /**
    * @SWG\Get(
    *   path="/api/user/transaksi",
    *   summary="Retrieve transaksi resources. ",
    *   produces={"application/json"},
    *   tags={"User Transaction"},
    *   @SWG\Response(
    *       response=200,
    *       description= "Item collection.",
    *       @SWG\Schema(
    *           type="array",
    *           @SWG\Items(ref="#/definitions/transaksi")
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
        $bars = transaksi::paginate();// model name
        return response()->json($bars->toArray());
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
        $transaksi = new transaksi();
        $transaksi->status = 'belum ditambah admin';
        $transaksi->id_member = Auth::User()->id();
        $transaksi->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bars  = transaksi::find($id);
        return response()->json($bars->toArray());
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
        $bars = transaksi::find($id);
        try{
         $this->validate($request,[
            'status'=>'required',
            ]);
        }catch(\Exception $ex){
            throw new \Exception('Data not found');
        }

        $bars->status = $request->input('status');
        $bars->save();
        return response()->json($bars->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bars = Bar::find($id);
        $bars ->delete();
        return response()->json("udah di delete");
    }
}
