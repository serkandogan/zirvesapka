<?php

namespace App\Models;
 
use App\Models\Product;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Model;

class GalleryGroup extends Model {

	protected $table = 'gkat';
	protected $primaryKey = 'id';

	public $timestamps  = false;  
 

}
