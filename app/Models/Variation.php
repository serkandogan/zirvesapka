<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model {

	protected $table = 'urunvaryasyon';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['UrunKodu', 'UrunID', 'Barkod', 'OZ', 'Stok'];
	// protected $guarded = [];

	public function getFeatures($id, $result = NULL)
	{
		$value = ProductFeatureList::where('ID', $id)->first();
		return $result <> NULL ? $value->$result : $value->ID;
	}

	public function fetaures($ozellik) 
	{
		$ozellik = explode(",", $ozellik);
		$result = array();
		foreach ($ozellik as $item) { 
			$result[] = $item;
		}
		return $result;
	}

	public function featureList($id) 
	{
		$result = array();
		foreach (ProductFeatureList::where('OzellikID', $id)->get() as $key=>$value) {
			$result[$key]['value'] = $value->ID;
			$result[$key]["text"] = $value->Baslik;
		}
		$json =  json_encode($result, true);
        return str_replace(array('"'), array('\'',), preg_replace('/"([^"]+)"\s*:\s*/', '$1:', $json));
	}

	public function orders() {
		return $this->hasMany(Product::class, 'ID');
	}

}