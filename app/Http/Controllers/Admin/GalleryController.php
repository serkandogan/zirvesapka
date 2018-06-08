<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateGallery;
use App\Http\Requests\UpdateGallery;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\GalleryGroup;
use App\Models\Product;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Request as Request; 
use Illuminate\Support\Facades\Input as Input;
use Validator;
use DB;
use File;
use Image;

class GalleryController extends AdminController {
	
	public function getIndex(){
		$images = GalleryGroup::all();
		return view('admin.product.gallery.index', compact('images'));
	}

	public function getImage($id){

		$product = Blog::findOrFail($id);
		// select galeri.* from galeri where galeri.kid=(select id from gkat where ED=43 and gkat.kid=18371 )order by galeri.id

		$galleryGroup = GalleryGroup::where('kid', $product->ID)->first();

		if($galleryGroup==null)
			$gallery = array();
		else 
			$gallery = Gallery::where('kid', $galleryGroup->id.'-p')->get();


		return view('admin.products.gallery.image', compact('product', 'gallery'));
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Gallery::$rules);
		$first = $validator->messages()->all();

		if($validator->fails()) {
			return redirect()->back()->with('fileuploadno', 0);
		} else {  
			if (Input::hasFile('imagefile')) {

				$files = Input::file('imagefile');
				foreach ($files as $key => $file) {
					$ext = $file->getClientOriginalExtension();
					$fileName = str_slug(Input::get('filename'))."-".str_random(6).".".$ext;
					$filesArrray[] = $fileName;
					$filePath = image_path(null, 'images').$fileName;
					Image::make($file->getRealPath())->save($filePath);
				}

				$addGgControl = GalleryGroup::where('kid', Input::get('urunID'))->get();
				$addResult = false;
				if (count($addGgControl)<1) {
					$addGg = new GalleryGroup;
					$addGg->adi = Input::get('filename');
					$addGg->kid = Input::get('urunID');
					$addGg->tarih = time();
					$addGg->save();
					$lastID = $addGg->id;
					$addResult = true;
				} else {
					$lastID = $addGgControl[0]->id;
					$addResult = true;
				}
				if ($addResult) {
					$addG = new Gallery;
					$addG->kid = $lastID;
					$addG->adi = $fileName;
					$addG->tur = $ext;
					$addG->save();
					if ($addG->save()) {
						return redirect()->back()->with('fileupload', 1)->withMessages($first);
					} else {
						return redirect()->back()->with('fileuploadno', 0)->withMessages($first);
					}
				} else {
					return redirect()->back()->with('fileuploadno', 0)->withMessages($first);
				}
			} else {
				return redirect()->back()->with('fileuploadno', 0)->withMessages($first);
			}
		}
	}

	public function getChangeimg($id, $urun){
		$changeimg=Gallery::findOrFail($id);
		
		return view('admin.produts.gallery.changeimg', compact('changeimg'));
	}

 
	public function getDelete($id, $urun) {

		$delete = Gallery::findOrFail($id);
		if (count($delete)>0) {
			$delete->delete();
			if( ! $delete->delete()){
				if (File::exists(image_path($delete->adi))) {
					File::delete(image_path($delete->adi));
				}
				return redirect('admin/gallery/image/'.$urun)->with('delete', 1);
			} else {
				return redirect('admin/gallery/image/'.$urun)->with('delete', 0);
			}
		}
	}
	
}