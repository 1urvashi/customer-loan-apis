<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	// public $timestamps = false;

	use Notifiable;
    protected $table = 'users';
	protected $fillable = [ 'username', 'password','secret_key' ];



}
