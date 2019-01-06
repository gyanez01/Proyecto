<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    protected $table = 'cliente';
	public $timestamps = false;
	
	protected $fillable = ['ccedula','cnombre','ccorreo','cdireccion','cfechanacimiento','ctelefono'];
}
