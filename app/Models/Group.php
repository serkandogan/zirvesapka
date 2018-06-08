<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $table = 'urungrup';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'Aciklama'];
	// protected $guarded = [];

	public function products() {
		return $this->hasMany(Product::class, 'grupID');
	}


	public static function groupSelect($data, $selected = null)
	{
		$result = null;

		foreach ($data as $key => $value) {
			$result .= '<option value="'.$value->ID.'" '.($selected==$value->ID ? 'selected' : null).'>'.$value->Baslik.'</option>'; 
		}
		return $result;
	}

}