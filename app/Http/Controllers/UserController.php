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
        if(!in_array(unserialize($user->roles), 'Member')){
            //member mau pengiriman
            $coba = Auth::user();
            return response()->json($coba->toArray());
        }else{
            //create new user for admin
          $user = new User();
          $user->name = $request->input('name');
          $user->password = $request->input('password');
          $user->roles = $request->input('roles');
          $user->save();
          $id = User::where('id',$user->name);
          //ambil data nya
          if($request->input('roles') == 'Member'){
            $pengirim = new Pengirim();
            $pengirim->nama = $request->input('name');
            $pengirim->nomor_telepon = $request->input('nomor_telepon');
            $pengirim->alamat = $request->input('alamat');
            $pengirim->ktp = $request->input('ktp');
            $pengirim->id_users = $id;
            $pengirim->save();
          }
          return response()->json("Success : Data added",200);
        }

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
