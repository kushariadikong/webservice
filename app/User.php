<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
    *   @SWG\Definition(
    *       definition = "User",
    *       @SWG\Property(
    *           property = "email",
    *           type = "string",
    *       ),
    *       @SWG\Property(
    *           property = "password",
    *           type = "string",
    *       ),
    *       @SWG\Property(
    *           property = "roles",
    *           type = "string",
    *       ), 
    *     )     
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password','roles',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
