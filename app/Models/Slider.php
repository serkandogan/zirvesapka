<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model {

	protected $table = 'slider';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'Aciklama'];
	// protected $guarded = [];
	public static $rules =  [
		'image'	=> 'required|max:2000',
		'imagename'	=> 'required'
		// 'image'		=> 'required|max:2000|mimes:jpeg,bmp,png,gif'
	];
}
