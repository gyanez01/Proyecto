<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransporteModel extends Model
{
    protected $table = 'transporte';
	public $timestamps = false;
	
	protected $fillable = ['traplaca','tramarca','tratipo','traanio'];
}
