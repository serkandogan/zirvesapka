<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreatePage;
use App\Http\Requests\UpdatePage;
use App\Models\Page;
use Input;
use Validator;
use App\Models\Gallery;
use App\Models\GalleryGroup;
use DB;
use File;
use Image;

class PagesController extends AdminController {

	public function getIndex($parent_id = null) {
		if($parent_id == null){
			$pages = Page::where('gid','=',0)->orderBy('id', 'DESC')->paginate(30);
			return view('admin.pagess.index', compact('pages'));
		}else
		{
			$pages = Page::where('gid', '=', $parent_id)->paginate(30);
			return view('admin.pagess.index', compact('pages'));
		}

	}
	public function postCkeditorFotoUp ($name){
		$fotodir =  'upload/images/';

		$return = "";
		$input = Input::all();
		$file = Input::file('upload');
		$filedurum = $this->FotoYukleme($file, $fotodir,$name);

		if ($filedurum['durum']){
			$funcNum = $_GET['CKEditorFuncNum'] ;
			$CKEditor = $_GET['CKEditor'] ;
			$langCode = $_GET['langCode'] ;

			$url = asset("upload/images/" . $filedurum['yenifotoadi']);



			$message = '';

			echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
		} else {
			echo "Foto Uyumsuz";
		}
	}
	public function FotoYukleme ($img, $fotoyolu,$name) {

		$durum = array('durum' => false);

		$uzanti = $img->getClientOriginalExtension();
		$yenifotoadi = str_slug($name) . rand(10,999999) . '_' . date("d_m_Y") . '.' . $uzanti;

		if($img->move($fotoyolu, $yenifotoadi)) {
			$durum = array('durum' => true, 'yenifotoadi' => $yenifotoadi);
		}


		return $durum;
	}
	public function getSub($parent_id = null){
		if($parent_id == null){
			$pages = Page::where('parent_id','=',0)->orderBy('id', 'DESC')->paginate(30);
			return view('admin.pagess.index', compact('pages'));
		}else
		{
			$pages = Page::where('parent_id', '=', $parent_id)->paginate(30);
			return view('admin.pagess.index', compact('pages'));
		}
	}

	public function getCreate () {
		$altpage = Page::pagesSelect(Page::all());
		$images = GalleryGroup::all();
		return view('admin.pagess.create',compact('altpage','images'));
	}

	public function postCreate () {
		$validator = Validator::make(Input::all(),['name'=>'required']);
		$messages = $validator->messages();
		if ($validator->fails())  {
			return redirect()->back()->with('noadded', 1)->withInput();
		}
		$filesArrray = array();
		if(Input::hasFile('images')) {
			$files = Input::file('images');
			foreach ($files as $key => $file) {
				$ext = $file->getClientOriginalExtension();
				$fileName = str_slug(Input::get('name'))."-".str_random(6).".".$ext;
				$filesArrray[] = $fileName;
				$filePath = image_path(null, 'images').$fileName;
				Image::make($file->getRealPath())->save($filePath);
			}
		} else {
			$fileName = null;
		}
		$record = new Page;
		$record->name = Input::get('name');
		$record->explanation = Input::get('explanation');
		$record->content = Input::get('content');
		$record->gid = Input::get('gid');

		$turkce = array("ş", "Ş", "ı", "(", ")", "‘", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü");
		$duzgun = array("s", "s", "i", "", "", "", "u", "u", "o", "o", "c", "c", "-", "-", "-", "", "s", "s", "i", "g", "g", "i", "o", "O", "c", "c", "u", "u");
		$urunadi1=Input::get('name');
		$urunadi1parcala= str_replace("<p>","",$urunadi1);
		$urunadi1parcala2= str_replace("</p>","",$urunadi1parcala);
		$urunadi1parcala3= str_replace("\r\n"," ",$urunadi1parcala2);
		$seo_uyumlu_link = str_slug(str_replace($turkce, $duzgun, $urunadi1parcala3));
		$record->url = $seo_uyumlu_link;

		$record->OldImage = $fileName;
		$record->images = $fileName;
		$record->save();
		if ($record->save()) {
			return redirect(url('admin/pagess'))->with('added',1);
		}else{
			return redirect()->back()->with('noadded', 1)->withInput();
		}
	}

	public function getUpdate($id){
		$pageupdate = Page::find($id);
		return view('admin.pagess.edit', compact('pageupdate'));
	}



	public function postUpdate($id)
	{
		$validator = Validator::make(Input::all(), ['name' => 'required']);
		$validator_message = $validator->messages()->first();
		if ($validator->fails())
		{
			return redirect()->back()->withMessage($validator_message);
		}
		$filesArrray = array();
		if(Input::hasFile('images')) {
			$files = Input::file('images');
			foreach ($files as $key => $file) {
				$ext = $file->getClientOriginalExtension();
				$fileName = str_slug(Input::get('name'))."-".str_random(6).".".$ext;
				$filesArrray[] = $fileName;
				$filePath = image_path(null, 'images').$fileName;
				Image::make($file->getRealPath())->save($filePath);
			}
		} else {
			$fileName = null;
		}
		$pageupdate = Page::find($id);
		$pageupdate->name = Input::get('name');
		$pageupdate->explanation = Input::get('explanation');
		$pageupdate->content = Input::get('content');
        if(($pageupdate->images = $fileName) == null){
            $pageupdate->images = Input::get('OldImage');
        }else{

            $pageupdate->Resim = $fileName;
            $pageupdate->OldImage = $fileName;
        }
		$pageupdate->save();
		if ($pageupdate->save())
		{
			return redirect()->back();
		} else
		{
			return redirect()->back()->withMessage('Sayfa Eklenemedi');
		}
	}

	public function postUpdate2($id){
		$validator = Validator::make(Input::all(), ['title'=>'required']);
		$validator_message = $validator->messages();
		if ($validator->fails()) {
			return redirect()->back()->with('noupdated', 1)->withInput();
		}
		$pageupdate = Page::find($id);
		$pageupdate->title = Input::get('title');
		$pageupdate->description = Input::get('description');
		$pageupdate->keyword = Input::get('keyword');
		if ($pageupdate->save()) {
			return redirect('admin/pagess')->with('updated', 1);
		} else {
			return redirect()->back()->with('noupdated', 1);
		}
	}

	public function getDelete($id ) {
		$page = Page::find($id);
		$page->delete();
		return redirect()->back()->with('deleted', 1);
	}
}