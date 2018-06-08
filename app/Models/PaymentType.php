<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model {

	protected $table = 'odemeturu';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'Indirim','Fiyat'];

	public function products() {
		return $this->hasMany(Product::class, 'markaID');
	}

}
