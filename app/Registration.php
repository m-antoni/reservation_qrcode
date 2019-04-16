<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'phone',
    	'amount',
    	'date',
    	'token'
    ];  

    protected $dates = [
		'date',
		'created_at',
		'updated_at'
    ];
}
