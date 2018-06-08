<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeatureList extends Model {

	protected $table = 'urundeger';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'OzellikID'];

	public function productfeaturelists() {
		return $this->belongsTo(ProductFeatureList::class, 'OzellikID', 'ID');
	}

	
}
