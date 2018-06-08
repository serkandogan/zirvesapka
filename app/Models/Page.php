<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	protected $table = 'pages';

	protected $primaryKey = 'id';

	public $timestamps  = false;
	protected $fillable = ['name', 'explanation', 'content'];

	public static $rules =  [
		'name' => 'required|min:3',
	];

	public static function pagesSelect($data, $gid = 0, $selected = null, $level = 0) {
		$result = null;
		foreach ($data as $key => $value) {
			if ($value->gid==$gid) {
				$result .= '<option value="'.$value->id.'" '.($selected==$value->id ? 'selected' : null).'>'
					.$value->name.'</option>';
				$result .= self::pagesSelect($data, $value->id, $selected, $level+1);
			}
		}
		return $result;
	}
    public function image($productID, $counts = 1) {
        $product = Page::find($productID);
        if (count($product) > 0) {
            $galleryGroup = GalleryGroup::where('kid', $product->id)->first();
            if($galleryGroup==null)
                $gallery = array();
            else
                $gallery = Gallery::where('kid', $galleryGroup->id)->get();
            if ($counts==1 && count($gallery)>0) {
                return $gallery[0];
            }
            return $gallery;
        } else {
            return "http://fakeimg.pl/768x400";
        }
    }
}
