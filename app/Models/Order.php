<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $table = 'siparisler';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'Aciklama'];
	// protected $guarded = [];

	public function orderdetail() {
		return $this->belongsTo(OrderDetail::class, 'ID', 'SiparisID');
	}

	public function siparisdetaylar() {
		return $this->belongsTo(User::class, 'SiparisID', 'ID');
	}

	public function user() {
		return $this->belongsTo(User::class, 'UyeID', 'id');
	}

	public function useradres() {
		return $this->belongsTo(UserAdres::class, 'UyeID', 'user_id');
	}

	public function teslimatadres() {
		return $this->belongsTo(UserAdres::class, 'TeslimatAdresi', 'id');
	}

	public function faturaadres() {
		return $this->belongsTo(UserAdres::class, 'FaturaAdresi', 'id');
	}
	
	public function getOrder($id) 
	{
		$order = OrderStatus::find($id);
		if (count($order)>0) {
			return $order->Baslik;
		}
		return 0;
	}

	public function orderDetailList() 
	{
		$result = array();
		foreach (OrderStatus::all() as $key=>$value) {
			$result[$key]['value'] = $value->ID;
			$result[$key]["text"] = $value->Baslik;
		}
		$json =  json_encode($result, true);
        return str_replace(array('"'), array('\'',), preg_replace('/"([^"]+)"\s*:\s*/', '$1:', $json));
	}

	

}
