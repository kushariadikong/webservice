<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
*		@SWG\Swagger(
*			basePath="",
*			host="localhost:8000",
*			schemes={"http"},
*			@SWG\Info(
*				version="1.0",
*				title="Pengiriman",
*				@SWG\Contact(
*					name="Arif,Dixon,Kushariadi Team",
*					url="https://github.com/KushariadiKong/WebService",
*					)
*				),
*				@SWG\Definition(
*					definition="Error",
*					required ={"code","message"},
*					@SWG\Property(
*						property="code",
*						type="integer",
*						format="int32"
*					),
*					@SWG\Property(
*						property="message",
*						type="string"
*					)
*				),
*		)
*/

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function grantIfRole(String ...$roles){
    	$user = Auth::user();
    	if(!in_array(unserialize($user->roles), $roles)){
    		//then throw exception
    		return response()->json(['error' => Auth::user()->name.', bukan admin'],403);
    	}
}
