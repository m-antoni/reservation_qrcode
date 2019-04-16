<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
    	'name',
    	'time_in',
    	'time_out',
    	'status'
    ];

    protected $dates = [
		'time_in',
		'time_out',
		'created_at',
		'updated_at'
    ];
}
