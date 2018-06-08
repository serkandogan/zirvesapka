<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tedarikci extends Model {

	protected $table = 'tedarikciler';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'Aciklama'];
	// protected $guarded = [];

	public function products() {
		return $this->hasMany(Product::class, 'teradikciID');
	}

}
