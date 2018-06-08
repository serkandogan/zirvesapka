<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBlog;
use App\Http\Requests\UpdateBlog;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Classs;
use App\Models\Gallery;
use App\Models\GalleryGroup;
use App\Models\SchoolSection;
use Input;
use Image;
use Validator;
use App\Http\Controllers\Auth;

class BlogsController extends Controller {

	public function getIndex() {
		$blogs = Blog::with(['category'])->orderBy('ID', 'DESC')->paginate(50);
		return view('admin.blogs.index', compact('blogs'));
	}

	public function getCreate () {
        $categorySelect 	= Category::categorySelect(Category::all());
        return view('admin.blogs.create', compact('categorySelect'));
	}

	public function postCreate () {
        $validator = Validator::make(Input::all(), ['Baslik'=>'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails()) {
            return redirect()->back()->withMessage($validator_message);
        }
        $filesArrray = array();
        if(Input::hasFile('Resim')) {
            $files = Input::file('Resim');
            foreach ($files as $key => $file) {
                $ext = $file->getClientOriginalExtension();
                $fileName = str_slug(Input::get('Baslik'))."-".str_random(6).".".$ext;
                $filesArrray[] = $fileName;
                $filePath = image_path(null, 'images').$fileName;
                Image::make($file->getRealPath())->save($filePath);
            }
        } else {
            $fileName = null;
        }
		$record = new Blog;
		$record->Baslik = Input::get('Baslik');
		$record->title = Input::get('Baslik');
		$record->Aciklama = Input::get('Aciklama');
		$record->description = Input::get('Aciklama');
		$record->Icerik = Input::get('Icerik');
        $record->type = Input::get('type');

        $turkce = array("ş", "Ş", "ı", "(", ")", "‘", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü");
        $duzgun = array("s", "s", "i", "", "", "", "u", "u", "o", "o", "c", "c", "-", "-", "-", "", "s", "s", "i", "g", "g", "i", "o", "O", "c", "c", "u", "u");
        $urunadi1=Input::get('Baslik');
        $urunadi1parcala= str_replace("<p>","",$urunadi1);
        $urunadi1parcala2= str_replace("</p>","",$urunadi1parcala);
        $urunadi1parcala3= str_replace("\r\n"," ",$urunadi1parcala2);
        $seo_uyumlu_link = str_slug(str_replace($turkce, $duzgun, $urunadi1parcala3));

        $url=$seo_uyumlu_link;
        $kontrol=Blog::where('refurl','LIKE',"$url%")->orderBy('ID','DESC')->get();

        if(count($kontrol)>0){
            $kontrol_toplam=count($kontrol)+1;
            $refurl=$url.'-'.$kontrol_toplam;
        }else{
            $refurl=$url;
        }



        $record->refurl = $refurl;


        $record->OldImage = $fileName;
        $record->Resim = $fileName;
        $record->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $record->updated_at = \Carbon\Carbon::now()->toDateTimeString();
        $record->author = Input::get('author');
        $record->Aktif =Input::get('Aktif');
		$record->save();
		if ($record->save()) {
			return redirect(url('admin/blogs'))->with('added',1);
		}else{
			return redirect()->back()->with('noadded', 1)->withInput(); 
		}
	}
	public function getUpdate($id){
		$blogs = Blog::find($id);
        $schoolsection = Category::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
		return view('admin.blogs.edit', compact('blogs','schoolsection'));
	}
	public function postUpdate($id){
        $validator = Validator::make(Input::all(), ['Baslik'=>'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails()) {
            return redirect()->back()->withMessage($validator_message);
        }
        $filesArrray = array();
        if(Input::hasFile('Resim')) {
            $files = Input::file('Resim');
            foreach ($files as $key => $file) {
                $ext = $file->getClientOriginalExtension();
                $fileName = str_slug(Input::get('Baslik'))."-".str_random(6).".".$ext;
                $filesArrray[] = $fileName;
                $filePath = image_path(null, 'images').$fileName;
                Image::make($file->getRealPath())->save($filePath);
            }
        } else {
            $fileName = null;
        }
        $record = Blog::find($id);
        $record->Baslik = Input::get('Baslik');
        $record->title = Input::get('Baslik');
        $record->Aciklama = Input::get('Aciklama');
        $record->description = Input::get('Aciklama');
        $record->Icerik = Input::get('Icerik');
        $record->type = Input::get('type');
        $record->updated_at = \Carbon\Carbon::now()->toDateTimeString();
        $record->author =Input::get('author');
        $record->Aktif =Input::get('Aktif');
        if(($record->Resim =$fileName) == null){
            $record->Resim = Input::get('OldImage');
        }else{

            $record->Resim = $fileName;
            $record->OldImage = $fileName;
        }
        $record->save();
		if ($record->save()) {
			return redirect('admin/blogs')->with('updated', 1);
		} else {
			return redirect('admin/blogs/edit/'.$record->ID)->with('noupdated', 1);
		}
	}

    public function postUpdate2($id){
        $validator = Validator::make(Input::all(), ['title'=>'required']);
        $validator_message = $validator->messages();
        if ($validator->fails()) {
            return redirect()->back()->with('noupdated', 1)->withInput();
        }
        $pageupdate = Blog::find($id);
        $pageupdate->title = Input::get('title');
        $pageupdate->description = Input::get('description');
        $pageupdate->keyword = Input::get('keyword');
        if ($pageupdate->save()) {
            return redirect()->back()->with('updated', 1);
        } else {
            return redirect()->back()->with('noupdated', 1);
        }
    }

	public function getDestroy($id ) {
        $record = Blog::find($id);
        $record->delete();
		return redirect('admin/blogs')->with('deleted', 1);
	}
}