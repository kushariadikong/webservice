<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
	*	@SWG\Definition(
	*		definition = "item",
	*		@SWG\Property(
	*			property = "no_resi",
	*			type = "integer",
	*			format = "int32",
	*		),
	*		@SWG\Property(
	*			property = "id_item",
	*			type = "integer",
	*			format = "int32",
	*		),
	*		@SWG\Property(
	*			property = "nama_penerima",
	*			type = "string",
	*		),
	*		@SWG\Property(
	*			property = "alamat_penerima",
	*			type = "text",
	*		),
	*		@SWG\Property(
	*			property = "nomor_telepon_penerima",
	*			type = "string",
	*		),
	*		@SWG\Property(
	*			property = "id_pengantar",
	*			type = "integer",
	*			format = "int32",
	*		),
	*		@SWG\Property(
	*			property = "berat",
	*			type = "integer",
	*			format = "int32",
	*		),
	*		@SWG\Property(
	*			property = "biaya",
	*			type = "integer",
	*			format = "int32",
	*		),
	*	)
	*	
    */
}
