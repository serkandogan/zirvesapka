<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use App\Models\Category;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Request as Request;

class CategoryController extends AdminController {

	public function getSavecategory(Request $input) 
	{
		$category = new Category;
		$data = json_decode($input::get('data'), true);
		$data = $category->categoryArrayResult($data);
		$i = 0;
		$return = false;
		foreach ($data as $key => $value) {
			$id = intval($value["id"]); 
			$gid = intval($value["gid"]); 
			if (Category::where('ID',$id)->get()) {
				$categortResult = Category::where('ID',$id)->update(['Sira'=> $i,'gid'=> $gid]);
				if($categortResult) 
					$return = true;
			}
			$i++;
		}
		if ($return) {
			return 1;
		} else {
			return 0;
		}
	}
}