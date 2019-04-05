<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $fillable = ['name', 'birthdate', 'workdate', 'iddprt', 'email', 'phone', 'cv', 'jobtitle', 'salary', 'image'];
}
