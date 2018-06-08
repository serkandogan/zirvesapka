<?php

namespace App\Http\Controllers\Site;
 
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use App\Models\Product;
use App\Models\Category; 

class CartController extends SiteController
{
	
	public function getIndex() {
		$products = Product::orderBy('ID','desc')->paginate(2);
		return view(theme('home'), compact('products'));
	} 
}