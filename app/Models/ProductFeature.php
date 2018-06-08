<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model {

	protected $table = 'urunozellik';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'Aciklama'];

	public function productfeaturelists() {
		return $this->hasMany(ProductFeatureList::class, 'OzellikID');
	}
	
}
