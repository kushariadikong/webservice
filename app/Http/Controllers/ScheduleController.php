<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{

  /**
    * @SWG\Get(
    *   path="/api/admin/schedule",
    *   summary="Retrieves the collection of Schedule resources if you are admin.",
    *   produces={"application/json"},
    *   tags={"All Schedule"},
    *   @SWG\Response(
    *       response=200,
    *       description= "Mediafiles collection.",
    *       @SWG\Schema(
    *           type="array",
    *           @SWG\Items(ref="#/definitions/schedule")
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

  /**
    * @SWG\Get(
    *   path="/api/user/schedule",
    *   summary="Retrieve schedule resources for user. ",
    *   produces={"application/json"},
    *   tags={"User's Schedule"},
    *   @SWG\Response(
    *       response=200,
    *       description= "Mediafiles collection.",
    *       @SWG\Schema(
    *           type="array",
    *           @SWG\Items(ref="#/definitions/schedule")
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
        //return schedule for account, return all if admin
        if(!in_array(unserialize($user->roles), 'Member')){
            //tampilkan hanya punya member tersebut
            $coba = Auth::User()->id;
            $data = Schedule::find($coba);
            return response()->json($data->toArray());
        }
        else if(!in_array(unserialize($user->roles), 'Admin'))
        {
            $data = Schedule::paginate();
            return response()->json($data->toArray());
        }
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

    /**
    * @SWG\Post(
    *   path="/api/admin/schedule",
    *   summary="Add new scheduling. ",
    *   produces={"application/json"},
    *   consumes={"application/json"},
    *   tags={"Admin Scheduling"},
    *   @SWG\Response(
    *       response=200,
    *       description= "Data Added.",
    *       @SWG\Schema(
    *           type="array",
    *           @SWG\Items(ref="#/definitions/schedule")
    *           )
    *   ),
    *   @SWG\Response(
    *       response=401,
    *       description= " Unauthorized action.",
    *   ),
    *   @SWG\Parameter(
    *       name="Authorization",
    *       in="header",
    *       required=true,
    *       type="string"
    *   )
    * )
    */
    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->item_detail = $request->input('item_detail');
        $schedule->lokasi = $request->input('lokasi');
        $schedule->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Schedule::find($id);
        return response()->json($data->toArray());
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

    /**
    * @SWG\Put(
    *   path="/api/admin/schedule/{id}",
    *   summary="Update data scheduling (assign nomor resi dan pengirim). ",
    *   produces={"application/json"},
    *   consumes={"application/json"},
    *   tags={"Admin Scheduling"},
    *   @SWG\Response(
    *       response=200,
    *       description= "Data Edited.",
    *       @SWG\Schema(
    *           type="array",
    *           @SWG\Items(ref="#/definitions/schedule")
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
    *   ),
    *   @SWG\Parameter(
    *       name = "Nomor Resi.",
    *       in="body",
    *       required=true,
    *       type = "string",
    *       @SWG\Schema(
    *           type ="array",
    *           @SWG\Items(ref="#/definitions/schedule")
    *           ),
    *     )
    * )
    */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->no_resi = $request->input('no_resi');
        $scheudle->id_kurir = $request->input('id_kurir');
        $schedule->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
