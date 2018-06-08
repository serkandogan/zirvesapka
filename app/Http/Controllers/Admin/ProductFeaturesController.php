<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateProductFeature;
use App\Http\Requests\UpdateProductFeature;
use App\Models\ProductFeature; 

class ProductFeaturesController extends AdminController {

	public function index() {

		$productfeatures = ProductFeature::orderBy('ID', 'DESC')->paginate(50);

		return view('admin.productfeatures.index', compact('productfeatures'));
	}

	public function create() {
		return view('admin.productfeatures.create');
	}

	public function store(CreateProductFeature $input) {
		ProductFeature::create($input->all());

		return redirect('admin/productfeatures')->with('added', 1);
	}

	public function show($id) {
		$productfeature = ProductFeature::find($id);
		return view('admin.productfeatures.show', compact('productfeature'));
	}

	public function edit($id) {

		$productfeature = ProductFeature::orderBy('Baslik', 'ASC')->find($id);

		return view('admin.productfeatures.edit', compact('productfeature'));

	}

	public function update($id, UpdateProductFeature $input) {
 
		ProductFeature::find($id)->fill($input->all())->save();

		return redirect('admin/productfeatures')->with('updated', 1);
	}

	public function destroy($id) {
		$productfeature = ProductFeature::find($id);
		$productfeature->delete();

		return redirect('admin/productfeatures')->with('deleted', 1);
	}
}