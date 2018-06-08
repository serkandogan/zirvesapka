<?php

namespace App\Models;
 
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {

	protected $table = 'galeri'; 

	protected $primaryKey = 'id';

	public $timestamps  = false; 
	protected $fillable = ['Baslik', 'kid'];

	public static $rules =  [
			'imagefile'	=> 'required|max:2000',
			'filename'	=> 'required'
			// 'image'		=> 'required|max:2000|mimes:jpeg,bmp,png,gif'
		];

}
