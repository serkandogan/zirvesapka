<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model {

	protected $table = 'tedarikciler';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'Aciklama'];
	// protected $guarded = [];

	public function products() {
		return $this->hasMany(Product::class, 'teradikciID');
	}


	public static function supplierSelect($data, $selected = null) {
		$result = null;
		foreach ($data as $key => $value) {
			$result .= '<option value="'.$value->ID.'" '.($selected==$value->ID ? 'selected' : null).'>'.$value->Baslik.'</option>';
		}
		return $result;
	}


}
