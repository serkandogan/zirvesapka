<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Validator;
use Input;
use Image;

class CategoriesController extends Controller {
	public function getIndex()
	{
		$categories = Category::orderBy('Sira', 'ASC')->paginate(1550);
		$category = new Category;
		$categoryData = $category->categoryList($categories);
		$categorySelect = Category::categorySelect(Category::all());
		return view('admin.categories.index', compact('categoryData','categories','categorySelect'));
	}
	public function getCreate()
	{
		$categorySelect = Category::categorySelect(Category::all());
		return view('admin.categories.create', compact('categorySelect'));
	}
	public function postCreate()
	{
		$validator = Validator::make(Input::all(), ['Baslik' => 'required']);
		$validator_message = $validator->messages()->first();
		if ($validator->fails())
		{
			return redirect()->back()->withMessage($validator_message);
		}
		$filesArrray = array();
		$add = new Category;
		if (Input::hasFile('Resim'))
		{
			$files = Input::file('Resim');
			foreach ($files as $key => $file)
			{
				$ext = $file->getClientOriginalExtension();
				$fileName = str_slug(Input::get('Baslik')) . "-" . str_random(6) . "." . $ext;
				$filesArrray[] = $fileName;
				$filePath = image_path(null, 'image') . $fileName;
				Image::make($file->getRealPath())->save($filePath);
			}
		} else
		{
			$fileName = null;
		}
		$add->refurl = str_slug(Input::get('Baslik'));
		$add->Baslik = Input::get('Baslik');
		$add->title = Input::get('Baslik');
		$add->description = Input::get('Aciklama');
		$add->Aciklama = Input::get('Aciklama');
		$add->gid = Input::get('gid');
		$add->OldImage = $fileName;
		$add->Resim = $fileName;
		$add->Aktif = 1;
		if ($add->save())
		{
			return redirect('admin/categories');
		} else
		{
			return redirect()->back()->withMessage('Kategori Eklenemedi');
		}
		return redirect('admin/categories/create');
	}

	public function getUpdate($id)
	{
		$categories  = Category::find($id);
		$categories2 = Category::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
		$categorySelect = Category::categorySelect(Category::all());
		return view('admin.categories.update', compact('categories', 'categories2', 'categorySelect'));
	}

	public function postUpdate($id)
	{
		$validator = Validator::make(Input::all(), ['Baslik' => 'required']);
		$validator_message = $validator->messages()->first();
		if ($validator->fails())
		{
			return redirect()->back()->withMessage($validator_message);
		}
		$filesArrray = array();
		if (Input::hasFile('Resim'))
		{
			$files = Input::file('Resim');
			foreach ($files as $key => $file)
			{
				$ext = $file->getClientOriginalExtension();
				$fileName = str_slug(Input::get('Baslik')) . "-" . str_random(6) . "." . $ext;
				$filesArrray[] = $fileName;
				$filePath = image_path(null, 'image') . $fileName;
				Image::make($file->getRealPath())->save($filePath);
			}
		} else
		{
			$fileName = null;
		}
		$add = Category::find($id);
		$add->Baslik = Input::get('Baslik');
		$add->Aciklama = Input::get('Aciklama');
		$add->Aktif = 1;
		if(($add->Resim =$fileName) == null){
			$add->Resim = Input::get('OldImage');
		}else{
			$add->Resim = $fileName;
			$add->OldImage = $fileName;
		}
		if ($add->save()){
			return redirect('admin/categories');
		} else{
			return redirect()->back()->withMessage('Kategori Eklenemedi');
		}
	}

	public function getDestroy($id) {
		$product = Category::find($id);
		$product->delete();

		return redirect('admin/categories')->with('deleted', 1);
	}

}