<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Models\Product;
use App\Models\Order;
use App\Models\Ayarlar;
use Input;
use Image;
// use Illuminate\Http\Request;

// use App\Http\Requests;
 use App\Helpers\Helper;

class AdminmainController extends AdminController {

	public function dashboard() {
	//	return karlink("admin");
		return view('admin.pages.dashboard');
	}

	public function productCountAll() {		
		$product = Product::all();
		return count($product);
	}

	public function orderCountAll() {		
		$order = Order::all();
		return count($order);
	}

	public function ayarlar (){
		$record=Ayarlar::all();
		return view('admin.pages.ayarlar',compact('record'));
	}

	public function ayarguncelle () 
	{
		$filesArrray = array();
		if(Input::hasFile('logo')) {
			$file = Input::file('logo');
			foreach ($file as $key => $file) {
				$ext = $file->getClientOriginalExtension();
				$fileName = str_slug(Input::get('title'))."-".str_random(6).".".$ext;
				$filesArrray[] = $fileName;
				$filePath = image_path(null, 'images').$fileName;
				Image::make($file->getRealPath())->save($filePath);
			}

		} else {
			$fileName = null;
		}
		$filesArrray2 = array();
		if(Input::hasFile('favicon')) {
			$file = Input::file('favicon');
			foreach ($file as $key => $file) {
				$ext = $file->getClientOriginalExtension();
				$fileName2 = str_slug(Input::get('title'))."-".str_random(6).".".$ext;
				$filesArrray2[] = $fileName2;
				$filePath2 = image_path(null, 'images').$fileName2;
				Image::make($file->getRealPath())->save($filePath2);
			}

		} else {
			$fileName2 = null;
		}
		Ayarlar::set('url', Input::get('url'));
		Ayarlar::set('title', Input::get('title'));
		Ayarlar::set('description', Input::get('description'));
		Ayarlar::set('keyword', Input::get('keyword'));
		Ayarlar::set('phone', Input::get('phone'));
		Ayarlar::set('adres', Input::get('adres'));
		Ayarlar::set('mail', Input::get('mail'));
		Ayarlar::set('facebook-url', Input::get('facebook-url'));
		Ayarlar::set('twitter-url', Input::get('twitter-url'));
		Ayarlar::set('googleplus-url', Input::get('googleplus-url'));
		Ayarlar::set('googlemeta', Input::get('googlemeta'));
		Ayarlar::set('yandexmeta', Input::get('yandexmeta'));
		Ayarlar::set('bingmeta', Input::get('bingmeta'));
		Ayarlar::set('googleanalistik', Input::get('googleanalistik'));
		Ayarlar::set('yandexanalistik', Input::get('yandexanalistik'));
		Ayarlar::set('binganalistik', Input::get('binganalistik'));
		Ayarlar::set('copyright', Input::get('copyright'));
		Ayarlar::set('canonical', Input::get('canonical'));
		if(Ayarlar::set('logo', $fileName) == null){
			Ayarlar::set('oldlogo', Input::get('oldlogo'));
		}else{
			Ayarlar::set('logo', $fileName);
			Ayarlar::set('oldlogo', $fileName);
		}
		if(Ayarlar::set('favicon', $fileName2) == null){
			Ayarlar::set('oldfavicon', Input::get('oldfavicon'));
		}else{
			Ayarlar::set('favicon', $fileName2);
			Ayarlar::set('oldfavicon', $fileName2);
		}
		return redirect()->back();
	}

	
	

}
