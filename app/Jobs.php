<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    //
	protected $fillable = ['name','description','dep_id','status'];
	protected $table = 'job';
}
