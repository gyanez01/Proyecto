<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SucursalModel extends Model
{
    protected $table = 'sucursal';
	public $timestamps = false;
	
	protected $fillable = ['sucid','sucdireccion','suctelefono','sucfechaapertura','sucnombre'];
}
