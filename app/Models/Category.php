<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = 'urunkategori';

	protected $primaryKey = 'ID';

	public $timestamps  = false;
	protected $fillable = ['gid', 'Baslik', 'Aciklama', 'style'];

	public function catCount($id = 0) {
		$product = Product::where('KategoriID', $id)->get();
		return count($product);
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

	/*
	 * CategoryList
	 */
	public function categoryListSelf($categoryData, $gid = 0) {
		$result = null;
		foreach ($categoryData as  $item) {
			if ($item->gid == $gid) {
				$result .= ' 
                    <li class="dd-item dd3-item" data-order="'.$item->Sira.'" data-id="'.$item->ID.'">
                        <div class="dd-handle dd3-handle"> </div>
                        <div class="dd3-content">
                        	
                        	<b>'. $item->ID.'</b> | '.$item->Baslik.' 
                        	<div class="pull-right btn-xs-m">
                        	<div style="margin-top: -14px;" class="badge btn-success">Ürün Sayısı:'.$this->catCount($item->ID).'</div>
			                <a style="margin-top: -16px;" href="'.url('admin/categories/update/'.$item->ID).'" class="btn btn-xs btn-primary" title="Düzenle"><i class="fa fa-edit"></i></a>
			                <a target="_blank" style="margin-top: -16px;" href="'.url($item->refurl.'-k-'.$item->ID.'.html').'" class="btn btn-xs btn-primary" title="Sil"><i class="fa fa-rocket"></i></a>
			                <a class="btn btn-xs btn-danger" style="margin-top: -16px;" href="'. action('Admin\CategoriesController@getDestroy', [$item->ID]) .'" title="Sil"><i class="fa fa-trash"></i></a></div>
                        	
			               
                        	</div>'.
					$this->categoryListSelf($categoryData, $item->ID)
					.'</li>';

			}
		}
		return $result ? '<ol class="dd-list">'.$result.'</ol>':  null;
	}
	public function categoryList($veriler) {
		return $this->categoryListSelf($veriler);
	}
	public function categoryArrayResult($data, $gid = 0) {
		$return = array();
		foreach ($data as $key => $subValue) {
			$subData = array();
			if (isset($subValue["children"])) {
				var_dump($subValue["children"]);
				$subData = $this->categoryArrayResult($subValue["children"], $subValue["id"]);
			}
			$return[] = array('id'=>$subValue["id"], 'gid'=>$gid);
			$return = array_merge($return, $subData);
		}
		return $return;
	}
	public static function categorySelect($data, $gid = 0, $selected = null, $level = 0) {
		$result = null;
		foreach ($data as $key => $value) {
			if ($value->gid==$gid) {
				$result .= '<option value="'.$value->ID.'" '.($selected==$value->ID ? 'selected' : null).'>'.
					str_repeat('   - ', $level).$value->Baslik.'</option>';
				$result .= self::categorySelect($data, $value->ID, $selected, $level+1);
			}
		}
		return $result;
	}

	public static function getCategoryArray($data, $gid = 0, $deepth = 0) {
		$result = null;
		$deepth = 0;
		foreach ($data as $key => $item) {
			$deepth = $key;
			if ($item->gid == $gid) {
				if ($gid==0)  {
					$result .= '
                        <li><a class="parent" href="urunkategori/'.$item->refurl.'">'.$item->Baslik.'</a>
							<div class="vertical-dropdown-menu">
								<div class="vertical-groups col-sm-12">
								 	'.self::getCategoryArray($data, $item->ID, $deepth).' 
								</div>
							</div>
						</li>	 
					';
				} else {

					$result .= '<li><a href="urunkategori/'.$item->refurl.'">'.$item->Baslik.'</a>'.self::getCategoryArray($data, $item->ID, $deepth).'</li>';
				}
			}
		}
		return $result;
	}


	public static function getUrunList($data, $gid = 0, $deepth = 0) {
		$result = null;
		$deepth = 0;
		foreach ($data as $key => $item) {
			$deepth = $key;
			if ($item->gid == $gid) {
				if ($gid==0)  {
					$result .= '
						<li>
							<a class="parent" href="'.url($item->ID.'-kata-'.$item->refurl.'.html').'"><img style="margin-right: 4px;margin-top: 2px;" src="'.url(image('icon.png')).'">'.$item->Baslik.'</a>
							<div class="vertical-dropdown-menu" style="'.$item->style.'">
								<div class="vertical-groups col-sm-12">
								<h4 class="mega-group-header"><span>'.$item->Baslik.'</span></h4>
									'.self::getUrunList($data, $item->ID, $deepth).' 
								</div>
							</div>
						</li>
					';
				} else {

					$result .= '
						<div class="col-sm-3 mega-product" style="width:200px;height: 180px;border:1px solid #f3f3f3;margin-right: 2px;margin-bottom: 2px;border-radius: 4px;padding: 10px;">
							<div class="product-avatar" style="height: 120px;">
								<a href="' .url($item->ID.'-kata-'.$item->refurl.'.html').'">
									<img src="'.url(image($item->Resim)).'" style="width: 135px;max-height: 130px;">
								</a>
							</div>
							<div class="product-name">
								<a href="'.url($item->ID.'-kata-'.$item->refurl.'.html').'">'.$item->Baslik.'</a>
							</div>
							
						</div>
						
						
					'.self::getUrunList($data, $item->ID, $deepth).'';
				}
			}
		}
		return $result;
	}

	public static function getUrunList2($data, $gid = 0, $deepth = 0) {
		$result = null;
		$deepth = 0;
		foreach ($data as $key => $item) {
			$deepth = $key;
			if ($item->gid == $gid) {
				if ($gid==0)  {
					$result .= '
						<li>
							<a class="parent" href="'.url('showroom-urunu/'.$item->refurl.'-'.$item->ID.'.html').'">
							<img style="margin-right: 4px;margin-top: 2px;" src="'.url(image('icon.png')).'">
								'.$item->Baslik.'
								</a>
							<div class="vertical-dropdown-menu" style="width:500px;z-index:999999;">
								<div class="vertical-groups col-sm-12">
								<h4 class="mega-group-header"><span>'.$item->Baslik.'</span></h4>
									'.self::getUrunList2($data, $item->ID, $deepth).' 
								</div>
							</div>
						</li>
					';
				} else {

					$result .= '
						<div class="col-sm-3 mega-product" style="width:200px;height: 180px;border:1px solid #f3f3f3;margin-right: 2px;margin-bottom: 2px;border-radius: 4px;padding: 10px;">
							<div class="product-avatar" style="height: 120px;">
								<a href="' .url('showroom-urunu/'.$item->refurl.'-'.$item->ID.'.html').'">
									<img src="'.url(image($item->Resim)).'" style="width: 135px;max-height: 130px;">
								</a>
							</div>
							<div class="product-name">
								<a href="'.url('showroom-urunu/'.$item->refurl.'-'.$item->ID.'.html').'">'.$item->Baslik.'</a>
							</div>
							
						</div>
						
						
					'.self::getUrunList($data, $item->ID, $deepth).'';
				}
			}
		}
		return $result;
	}


	public static function getMainCategoryList($id, $gid = 0)
	{
		/**
		 * ilk önce ana kategorinin id sini bulmak
		 * sonra bulunan id ile gid idlerini eşleştirmek ve verileri almak
		 * @var null
		 */
		$result = array();
		$records = self::where('gid', $id)->get();

		foreach ($records as $key => $value) {
			$result[] = $value->ID;
		}

		return $result;
	}
}
