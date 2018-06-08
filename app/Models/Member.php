<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

	protected $table = 'uyeler';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['AdSoyad', 'eposta','Cinsiyet','Cep','Adres','Notlar'];

	public function products() {
		return $this->hasMany(Product::class, 'markaID');
	}

}
