<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model {

	protected $table = 'kargolar';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'Aciklama','Resim','Fiyat','SorguURL','KullaniciAdi','Sifre','ServisDemoURL','ServisURL','KargoNo'];

	public function products() {
		return $this->hasMany(Product::class, 'markaID');
	}

}
