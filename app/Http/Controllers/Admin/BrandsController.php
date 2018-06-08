<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateBrand;
use App\Http\Requests\UpdateBrand;
use App\Models\Brand;

class BrandsController extends AdminController {

	public function index() {

		$brands = Brand::orderBy('ID', 'DESC')->paginate(50);

		return view('admin.brands.index', compact('brands'));
	}

	public function create() {
		return view('admin.brands.create');
	}

	public function store(CreateBrand $input) {
		Brand::create($input->all());

		return redirect('admin/brands')->with('added', 1);
	}

	public function show($id) {
		$cargo = Brand::find($id);
		return view('admin.brands.show', compact('cargo'));
	}

	public function edit($id) {
		$brand      = Brand::orderBy('Baslik', 'ASC')->find($id);
		return view('admin.brands.edit', compact('brand'));
	}

	public function update($id, UpdateBrand $input) {
		Brand::find($id)->fill($input->all())->save();
		return redirect('admin/brands')->with('updated', 1);
	}

	public function destroy($id) {
		$cargo = Brand::find($id);
		$cargo->delete();

		return redirect('admin/brands')->with('deleted', 1);
	}
}