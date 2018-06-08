<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\CityTown;

class UserAdres extends Model { 

	protected $table = 'users_adresler'; 

	public static function iller()
	{
		$iller = City::all(); 
		$result = array();
		foreach ($iller as $key => $value) {
			$result[$value->ID] = $value->Baslik;
		}
		return $result;
	}

	public static function ilceler($il)
	{
		$iller = CityTown::where('IlID', $il)->get(); 
		$result = array();
		foreach ($iller as $key => $value) {
			$result[$value->ID] = $value->Baslik;
		}
		return $result;
	}

 
}
