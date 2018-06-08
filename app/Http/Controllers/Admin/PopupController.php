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
use App\Models\Popup;
use App\Models\SchoolSection;
use Input;
use Image;
use Validator;
use App\Http\Controllers\Auth;

class PopupController extends Controller {

    public function getIndex() {
        $popup = Popup::orderBy('ID', 'DESC')->paginate(10);
        return view('admin.popup.index', compact('popup'));
    }


    public function postCreate () {
        $validator = Validator::make(Input::all(), ['ad'=>'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails()) {
            return redirect()->back()->withMessage($validator_message);
        }
        $filesArrray = array();
        if(Input::hasFile('resim')) {
            $files = Input::file('resim');
            foreach ($files as $key => $file) {
                $ext = $file->getClientOriginalExtension();
                $fileName = str_slug(Input::get('ad'))."-".str_random(6).".".$ext;
                $filesArrray[] = $fileName;
                $filePath = image_path(null, 'images').$fileName;
                Image::make($file->getRealPath())->save($filePath);
            }
        } else {
            $fileName = null;
        }
        $filesArrray2 = array();
        if(Input::hasFile('mobil')) {
            $files2 = Input::file('mobil');
            foreach ($files2 as $key => $file2) {
                $ext = $file2->getClientOriginalExtension();
                $fileName2 = str_slug(Input::get('ad'))."-".str_random(6).".".$ext;
                $filesArrray2[] = $fileName2;
                $filePath2 = image_path(null, 'images').$fileName2;
                Image::make($file2->getRealPath())->save($filePath2);
            }
        } else {
            $fileName = null;
        }
        $record = new Popup;
        $record->ad = Input::get('ad');
        $record->oldresim = $fileName;
        $record->resim = $fileName;
        $record->mobil = $fileName2;
        $record->oldmobil = $fileName2;
        $record->tarih = \Carbon\Carbon::now()->toDateTimeString();
        $record->aktif =Input::get('aktif');
        $record->save();
        if ($record->save()) {
            return redirect()->back()->with('added',1);
        }else{
            return redirect()->back()->withInput();
        }
    }

    public function postUpdate3($id)
    {
        $validator = Validator::make(Input::all(), ['aktif' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails())
        {
            return redirect()->back()->withMessage($validator_message);
        }

        $add = Popup::find($id);
        $add->aktif = 1;
        if ($add->save())
        {
            return redirect()->back();
        } else
        {
            return redirect()->back()->withMessage('Ürün Eklenemedi');
        }
    }

    public function postUpdate4($id)
    {
        $validator = Validator::make(Input::all(), ['aktif' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails())
        {
            return redirect()->back()->withMessage($validator_message);
        }

        $add = Popup::find($id);
        $add->aktif = 0;
        if ($add->save())
        {
            return redirect()->back();
        } else
        {
            return redirect()->back()->withMessage('Ürün Eklenemedi');
        }
    }


    public function getDestroy($id ) {
        $record = Popup::find($id);
        $record->delete();
        return redirect()->back()->with('deleted', 1);
    }
}