<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalModel extends Model
{
    protected $table = 'personal';
	public $timestamps = false;
	
	protected $fillable = ['percedula','pernombre','perapellido','percargo','perfechanacimiento'];
}
