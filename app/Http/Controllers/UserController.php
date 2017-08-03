<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        if(!in_array(unserialize($user->roles), 'Member')){
            //tampilkan hanya punya member tersebut
            $coba = Auth::user();
            return response()->json($coba->toArray());
        }
        else if(!in_array(unserialize($user->roles), 'Admin'))
        {
            $user = User::paginate();
             return response()->json($user->toArray());
        }
        else
        {
            throw new AccessDeniedHttpException('Bukan member/admin');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        $user = new User();
        $user = $request->input('name');
        $user = $request->input('password');
        $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user = User::find($id);
       return response()->json($user->toArray());
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

    public function update(Request $request, $id)
    {
        //
            $users = User::find($id);
            $users->email     = $request->input('email');
            $users->password  = $request->input('password');
            $users->save();
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return response()->json(['success'],200);
    }
}
