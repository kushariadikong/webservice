<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

   /**
    *   @SWG\Definition(
    *       definition = "schedule",
    *       @SWG\Property(
    *           property = "item_detail",
    *           type = "string",
    *       ),
    *       @SWG\Property(
    *           property = "lokasi",
    *           type = "string",
    *       ),
    *       @SWG\Property(
    *           property = "no_resi",
    *           format = "int32",
    *           type = "integer",
    *       ), 
    *       @SWG\Property(
    *           property = "id_kurir",
    *           type = "integer",
    *           format = "int32"
    *       ),    
    *   )       
    */
class Schedule extends Model
{

}
