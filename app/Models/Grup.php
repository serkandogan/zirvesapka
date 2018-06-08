<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model {

	protected $table = 'urungrup';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'Aciklama'];
	// protected $guarded = [];

	public function products() {
		return $this->hasMany(Product::class, 'grupID');
	}

}
