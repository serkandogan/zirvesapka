<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBlog;
use App\Http\Requests\UpdateBlog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Classs;
use App\Models\Gallery;
use App\Models\GalleryGroup;
use App\Models\SchoolSection;
use App\Models\Video;
use Input;
use Image;
use Validator;
use App\Http\Controllers\Auth;

class VideoController extends Controller {

	public function getIndex() {
		$videos = Video::orderBy('ID', 'DESC')->paginate(50);
		return view('admin.video.index', compact('videos'));
	}

	public function getCreate () {

        return view('admin.video.create');
	}

	public function postCreate () {
        $validator = Validator::make(Input::all(), ['name'=>'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails()) {
            return redirect()->back()->withMessage($validator_message);
        }
		$filesArrray = array();
		if(Input::hasFile('image')) {
			$files = Input::file('image');
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
		$record = new Video;
		$record->name = Input::get('name');
		$record->embed = Input::get('embed');
		$record->refurl = str_slug(Input::get('name'));
		$record->oldimage = $fileName;
		$record->image = $fileName;
		$record->created_at = \Carbon\Carbon::now()->toDateTimeString();
		$record->updated_at = \Carbon\Carbon::now()->toDateTimeString();
		$record->author = Input::get('author');
		if ($record->save()) {
			return redirect(url('admin/video'))->with('added',1);
		}else{
			return redirect()->back()->with('noadded', 1)->withInput(); 
		}
	}
	public function getUpdate($id){
		$video = Video::find($id);
		return view('admin.video.edit', compact('video'));
	}
	public function postUpdate($id){
        $validator = Validator::make(Input::all(), ['name'=>'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails()) {
            return redirect()->back()->withMessage($validator_message);
        }
		$filesArrray = array();
		if(Input::hasFile('image')) {
			$files = Input::file('image');
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
        $record = Video::find($id);
        $record->name = Input::get('name');
        $record->embed = Input::get('embed');
        $record->refurl = str_slug(Input::get('name'));
		if(($record->image =$fileName) == null){
			$record->image = Input::get('oldimage');
		}else{

			$record->image = $fileName;
			$record->oldimage = $fileName;
		}
		if ($record->save()) {
			return redirect('admin/video')->with('updated', 1);
		} else {
			return redirect('admin/video/edit/'.$record->ID)->with('noupdated', 1);
		}
	}

	public function postUpdateMeta($id){
		$validator = Validator::make(Input::all(), ['title'=>'required']);
		$validator_message = $validator->messages();
		if ($validator->fails()) {
			return redirect()->back()->with('noupdated', 1)->withInput();
		}
		$pageupdate = Video::find($id);
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
        $record = Video::find($id);
        $record->delete();
		return redirect('admin/video')->with('deleted', 1);
	}
}