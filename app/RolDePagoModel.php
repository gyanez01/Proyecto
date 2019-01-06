<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolDePagoModel extends Model
{
    protected $table = 'roldepago';
	public $timestamps = false;
	
	protected $fillable = ['rolid','rolfecha','percedula','rolingreso','roldescuento','rolvalortotal'];
}
