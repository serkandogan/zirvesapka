<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnStatus extends Model {

	protected $table = 'iadedurum';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik'];

	public function products() {
		return $this->hasMany(Product::class, 'markaID');
	}

}
