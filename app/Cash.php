<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'phone',
    	'amount',
    	'date',
    	'status',
    	'token',
    ];  

    protected $dates = [
		'date',
		'created_at',
		'updated_at'
    ];
}
