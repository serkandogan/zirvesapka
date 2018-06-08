<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateSupplier;
use App\Http\Requests\UpdateSupplier;
use App\Models\Supplier;

class SuppliersController extends AdminController {

	public function index() {

		$suppliers = Supplier::orderBy('ID', 'DESC')->paginate(50);

		return view('admin.suppliers.index', compact('suppliers'));
	}

	public function create() {
		return view('admin.suppliers.create');
	}

	public function store(CreateSupplier $input) {
		Supplier::create($input->all());

		return redirect('admin/suppliers')->with('added', 1);
	}

	public function show($id) {
		$supplier = Supplier::find($id);
		return view('admin.suppliers.show', compact('supplier'));
	}

	public function edit($id) {
		$supplier      = Supplier::orderBy('Baslik', 'ASC')->find($id);
		return view('admin.suppliers.edit', compact('supplier'));
	}

	public function update($id, UpdateSupplier $input) {
		Supplier::find($id)->fill($input->all())->save();
		return redirect('admin/suppliers')->with('updated', 1);
	}

	public function destroy($id) {
		$supplier = Supplier::find($id);
		$supplier->delete();

		return redirect('admin/suppliers')->with('deleted', 1);
	}
}