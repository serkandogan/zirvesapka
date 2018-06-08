<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model {
	protected $table = 'form';
	protected $primaryKey = 'id';
	public $timestamps  = false;
	protected $fillable = ['adsoyad', 'created_at'];
}
