<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;
use App\Models\GalleryGroup;

class Blog extends Model {

	protected $table = 'blog';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['Baslik', 'BaslikAciklama', 'KategoriID','Aciklama', 'Icerik'];
	// protected $guarded = [];

	public function category() {
		return $this->belongsTo(Category::class, 'KategoriID', 'ID');
	}

	public function image($productID, $counts = 1) {

		$product = Product::find($productID);

		if (count($product) > 0) {

			$galleryGroup = GalleryGroup::where('kid', $product->ID)->first();

			if($galleryGroup==null) 
				$gallery = array();
			else 
				$gallery = Gallery::where('kid', $galleryGroup->id)->get();

			if ($counts==1) {
				return $gallery[0];
			}  
			return $gallery;
		} else {
			return "http://fakeimg.pl/768x400";
		}

	}

	public static function productListSelf($productData) {
		$result =Product::null;
		foreach ($productData as  $item) {
			if ($item->ID) {
				$result .= ' 
                    	'.$item->Baslik.'
                    	';
				}
		}
		return $result ? ''.$result.'':  null;
	}
}
