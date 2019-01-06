<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipoModel extends Model
{
    protected $table = 'equipo';
	public $timestamps = false;
	
	protected $fillable = ['eqcodigo','eqnombre','eqdescripcion','eqfechaadquicision'];
}
