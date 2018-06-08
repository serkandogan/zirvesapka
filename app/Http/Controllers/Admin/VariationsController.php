<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateVariation;  
use App\Models\Variation; 
use Input;
use Validator;
use Illuminate\Support\Facades\Request as Request;

		
class VariationsController extends AdminController {

	public function postCreate($id) {  
		if(empty(Input::get('Stok')) ||  empty(Input::get('UrunKodu'))) {
			return redirect()->back()->with('noadded', 1);
		}
		$oz = null;
		foreach (Input::get('OZ') as $value) {
			$oz .= $value.",";
		}
		$add= new Variation;
		$add->UrunID = $id;
		$add->UrunKodu = Input::get('UrunKodu');
		$add->Barkod   = Input::get('Barkod');
		$add->OZ       = substr($oz, 0, -1);
		$add->Stok     = Input::get('Stok');
		$add->Aktif    = 1;
		$add->save();
 		return redirect()->back()->with('updated', 1);
	}

	public function postEdit() 
	{
		$variation = Variation::find(Input::get('id'));
		if (Input::get('xtype')=='UrunKodu')
			$variation->UrunKodu = Input::get('UrunKodu');
		elseif (Input::get('xtype')=='Barkod')
			$variation->Barkod = Input::get('Barkod');
		elseif (Input::get('xtype')=='Stok')
			$variation->Stok = Input::get('Stok');
		elseif (Input::get('xtype')=='Durum')
			$variation->Aktif = Input::get('Durum');
		elseif (Input::get('xtype')=='OZ') { 
			$variation->OZ = str_replace(Input::get('oldid'), Input::get('OZ'), $variation->OZ); 
		}
		else 
			return false;
		$variation->save();
	}

	public function getDelete($id, $product) {
		$variation = Variation::find($id);
		$variation->delete();
		if (!$variation->delete()) {
			return redirect(route('admin.products.edit', $product))->with('deleted', 1);
		} else {
			return redirect()->back()->with('deleted', 0);
		}
	}


	public function postOrderstatus() 
	{
		$order = Order::find(Input::get('id')); 
		$order->Durum = Input::get('newValue'); 
		$order->save();
		return true;
	}
}