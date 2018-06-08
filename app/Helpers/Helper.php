<?php 

namespace App\Helpers;

use App\Models\Product;
use App\Models\Category;

class Helper {

	public static function categoryCount($id) {		
		$product = Product::where('KategoriID', $id)->get();
		return count($product);
	}

	public static function productCount($id) {		
		$product = Product::where('ID', $id)->get();
		return count($product);
	}

}	
