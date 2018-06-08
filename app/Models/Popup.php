<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model {
	protected $table = 'popup';
	protected $primaryKey = 'id';
	public $timestamps  = false;
	protected $fillable = ['ad', 'resim', 'aktif'];
}
