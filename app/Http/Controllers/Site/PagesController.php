<?php

namespace App\Http\Controllers\Site;
 
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use App\Models\Page;
use App\Models\Product;
use App\Models\Category; 
use App\Models\Blog;
use App\Models\Video;
use Input;

class PagesController extends SiteController
{

	public function getIndex ($name) {
		$pages  = Page::where('url',$name)->first();
		if($pages==null){
            return redirect('/');
        }else{
            if($pages->title==null){
                $getTitle=$pages->name;
            }else{
                $getTitle=$pages->title;
            }
            if($pages->description==null){
                $getDescription=$pages->explanation;
            }else{
                $getDescription=$pages->description;
            }
            if($pages->keyword==null){
                $getKeyword=ayar('keyword');
            }else{
                $getKeyword=$pages->keyword;
            }
            return view(theme('pagess.detail'), compact('pages','getTitle','getDescription','getKeyword'));
        }

	}


	public function getBlogList()
	{
		$blog=Blog::orderBy('ID','DESC')->paginate(20);
		$urunler=Product::inRandomOrder()->paginate(20);
		return view(theme('pagess.blog'), compact('getUrl','getImage','getTitle','getDescription','blog','marka','sessistemlerikategori','urunler'));
	}

	public function getBlog ($name) {
		$record  = Blog::where('refurl',$name)->first();
		$urunler=Product::inRandomOrder()->paginate(20);
		if($record->title==null){
			$getTitle=$record->Baslik;
		}else{
			$getTitle=$record->title;
		}
		if($record->description==null){
			$getDescription=$record->Aciklama;
		}else{
			$getDescription=$record->description;
		}
		if($record->keyword==null){
			$getKeyword=ayar('keyword');
		}else{
			$getKeyword=$record->keyword;
		}
		return view(theme('pagess.blogdetail'), compact('getUrl','getImage','getTitle','getDescription','urunler','record','getKeyword'));
	}

	public function getVideo ($name) {
		$record  = Video::where('refurl',$name)->first();
		$urunler=Product::inRandomOrder()->paginate(20);
		$getTitle = $record->name;
		$getDescription = $record->name;
		$getImage = url(image($record->image));
		$getUrl = url('blog/'.$record->refurl);
		return view(theme('pagess.videodetail'), compact('getUrl','getImage','getTitle','getDescription','urunler','record'));
	}
	public function getVideoList()
	{
		$blog=Video::orderBy('id','DESC')->paginate(20);
		$urunler=Product::inRandomOrder()->paginate(20);
		return view(theme('pagess.video'), compact('getUrl','getImage','getTitle','getDescription','blog','urunler'));
	}


	public function getCategory ($name, $id) {
		
		$record = Category::find($id);
		$parent = Category::getMainCategoryList($record->gid);
		$products = Product::where('ID',$id)->first();
		/**
		 * en alttaki kategorileri. --- şuanki kategori ID başlanacak.
		 * en üst kategoriye ait tüm ID bulunacak.
		 * TÜM BULUNAN TÜM ID ler ürün listeleme koşuluna tabi tutulacak.
		 * @var [type]
		 */
		$categoryResults = Product::where('KategoriID', $record->ID)->take(15)->paginate(15);
		return view(theme('category.detail'), compact('record','categoryResults'));
	}

	public function getSeach()
	{
		$keyword = Input::get('q');
		$productlists = Product::where('Baslik', 'LIKE', "%$keyword%")->orwhere('UrunKodu', 'LIKE', "%$keyword%")->orderBy('ID','desc')->paginate(21);
		
		return view(theme('product.search'), compact('keyword','productlists'));
	}

}