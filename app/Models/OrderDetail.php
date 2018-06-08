<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model {

	protected $table = 'siparisdetaylar';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'Aciklama','Fiyat'];
	// protected $guarded = [];

	public function orders() {
		return $this->hasMany(Order::class, 'ID');
	}

	public function urun() {
		return $this->belongsTo(Product::class, 'UrunID', 'ID');
	}

	public function fetaures($ozellik) 
	{
		$ozellik = explode(",", $ozellik);
		$result = array();
		foreach ($ozellik as $item) { 
			$result[] = $item;
		}
		return $result;
	}



}