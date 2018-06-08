<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public static $rules =  [
			'name' => 'required|min:3',
			'email' => 'required|unique:users|min:3',
			'password' => 'required|min:6',
		];

	public function roleTypeName($role) {
		if ($role==10) {
			return 'Admin';
		} else {
			return 'Üye';
		}
	}

}
