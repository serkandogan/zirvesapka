<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

	protected $table = 'urunmarka';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'Aciklama'];

	public function products() {
		return $this->hasMany(Product::class, 'markaID');
	}


   public static function brandSelect($data, $selected = null) {
		$result = null;
		foreach ($data as $key => $value) { 
				$result .= '<option value="'.$value->ID.'" '.($selected==$value->ID ? 'selected' : null).'>'.$value->Baslik.'</option>'; 
		}
		return $result;
	}



}
