<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model {

	protected $table = 'siparisdurum';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik'];

	public function products() {
		return $this->hasMany(Product::class, 'markaID');
	}

}
