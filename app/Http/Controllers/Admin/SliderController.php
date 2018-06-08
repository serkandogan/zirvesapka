<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateSlider;
use App\Http\Requests\UpdateSlider;
use App\Models\Slider;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Request as Request; 
use Illuminate\Support\Facades\Input as Input;
use Validator;
use DB;
use File;
use Image;

class SliderController extends AdminController {
	
	public function getIndex(){
		$records = Slider::orderBy('order','asc')->get();
		return view('admin.sliders.index', compact('records'));
	}
	
	public function postCreate () {
		$validator = Validator::make(Input::all(), Slider::$rules);
		$first = $validator->messages()->all();
		if($validator->fails()) {
			return redirect()->back()->with('fileuploadno', 0);
		} else {  

			if (Input::hasFile('image')) {
				$file = Input::file('image');
				$ext = $file->getClientOriginalExtension(); 
				$fileName = str_slug(Input::get('imagename'))."-".str_random(6).".".$ext;
				$filePath = image_path(null, 'slider').$fileName;
				Image::make($file->getRealPath())->save($filePath);

				$slider = new Slider;
				$slider->title = Input::get('imagename');
				$slider->imagename = $fileName;
				$slider->image = $fileName;
				$slider->text = Input::get('text');
				$slider->save();
				if ($slider->save()) {
					return redirect()->back()->with('fileupload', 1);
				} else {
					return redirect()->back()->with('fileuploadno', 1);
				}
			}

		}
		

		return view('admin.sliders.create');
	}
	public function getChangeimg($id){
		$sliders=Slider::findOrFail($id);
		
		return view('admin.sliders.index', compact('sliders'));
	}
	public function getDelete($id) {

		$delete = Slider::findOrFail($id);
		if (count($delete)>0) {
			$delete->delete();
			if( ! $delete->delete()){
				if (File::exists(image_path($delete->image, 'slider'))) {
					File::delete(image_path($delete->image, 'slider'));
				}
				return redirect('admin/slider/')->with('delete', 1);
			} else {
				return redirect('admin/slider')->with('delete', 0);
			}
		}
	}
	public function postOrderup(){
		$data = Input::get('list');  
		$no = 1;
		foreach ($data as $id) {
			Slider::where('id',$id)->update(array('order' => $no));
			$no++;
		}
		return 1;	
	}
	
}