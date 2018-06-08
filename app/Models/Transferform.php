<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transferform extends Model {

	protected $table = 'transferform';

	protected $primaryKey = 'id';

	public $timestamps  = false;
	protected $fillable = ['name'];

	public function product() {
		return $this->belongsTo(Product::class, 'product_id', 'ID');
	}
	public function bank() {
		return $this->belongsTo(Transfer::class, 'bank_id', 'id');
	}


}
