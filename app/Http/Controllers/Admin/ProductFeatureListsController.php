<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateProductFeatureList;
use App\Http\Requests\UpdateProductFeatureList;
use App\Models\ProductFeatureList;
use App\Models\ProductFeature;

class ProductFeatureListsController extends AdminController {

	public function index() {

		$productfeaturelists = ProductFeatureList::orderBy('ID', 'DESC')->paginate(50);
		return view('admin.productfeaturelists.index', compact('productfeaturelists'));
	}

	public function create() {
		return view('admin.productfeaturelists.create');
	}

	public function store(CreateProductFeatureList $input) {
		ProductFeatureList::create($input->all());

		return redirect('admin/productfeaturelists')->with('added', 1);
	}

	public function show($id) {



		$productfeaturelist = ProductFeatureList::find($id);
		return view('admin.productfeaturelists.show', compact('productfeaturelist'));
	}

	public function edit($id) {


		$productfeaturelist  = ProductFeatureList::find($id);
		$productfeature 	 = ProductFeature::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');

		return view('admin.productfeaturelists.edit', compact('productfeaturelist','productfeature'));

	}

	public function update($id, UpdateProductFeatureList $input) {

		ProductFeatureList::find($id)->fill($input->all())->save();


		return redirect('admin/productfeaturelists')->with('updated', 1);
		
	}

	public function destroy($id) {
		$productfeaturelist = ProductFeatureList::find($id);
		$productfeaturelist->delete();

		return redirect('admin/productfeaturelists')->with('deleted', 1);
	}
}