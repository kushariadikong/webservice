<?php

namespace App\Http\Controllers;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

/**
*   @SWG\Post(
*       path="/api/user/login_check",
*       summary="Authenticate User.",
*       produces={"application/json"},
*       consumes={"application/json"},
*       tags={"login"},
*       @SWG\Response(
*           response=200,
*           description="User token.",
*           @SWG\Property(
*               property="token",
*               type="string"
*           )
*       ),
*       @SWG\Response(
*           response=401,
*           description="Unauthorized action."
*       ),
*       @SWG\Parameter(
*           name="body",
*           in="body",
*           required=true,
*           type="string",
*           @SWG\Schema(
*               type="string"
*           )
*       )
*)
*/

/**
*   @SWG\Post(
*       path="/api/admin/login_check",
*       summary="Authenticate User.",
*       produces={"application/json"},
*       consumes={"application/json"},
*       tags={"login"},
*       @SWG\Response(
*           response=200,
*           description="User token.",
*           @SWG\Property(
*               property="token",
*               type="string"
*           )
*       ),
*       @SWG\Response(
*           response=401,
*           description="Unauthorized action."
*       ),
*       @SWG\Parameter(
*           name="body",
*           in="body",
*           required=true,
*           type="string",
*           @SWG\Schema(
*               type="string"
*           )
*       )
*)
*/
class AuthenticationController extends Controller
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }
}


