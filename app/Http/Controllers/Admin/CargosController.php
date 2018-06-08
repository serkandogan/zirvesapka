<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCargo;
use App\Http\Requests\UpdateCargo;
use App\Models\Cargo;

class CargosController extends Controller {

	public function index() {

		$cargos = Cargo::orderBy('ID', 'DESC')->paginate(50);

		return view('admin.cargos.index', compact('cargos'));
	}

	public function create() {
		return view('admin.cargos.create');
	}

	public function store(CreateCargo $input) {
		Cargo::create($input->all());

		return redirect('admin.admin/cargos')->with('added', 1);
	}

	public function show($id) {
		$cargo = Cargo::find($id);
		return view('admin.cargos.show', compact('cargo'));
	}

	public function edit($id) {
		$cargo      = Cargo::orderBy('Baslik', 'ASC')->find($id);
		return view('admin.cargos.edit', compact('cargo'));
	}

	public function update($id, UpdateCargo $input) {
		Cargo::find($id)->fill($input->all())->save();
		return redirect('admin.admin/cargos')->with('updated', 1);
	}

	public function destroy($id) {
		$cargo = Cargo::find($id);
		$cargo->delete();

		return redirect('admin.admin/cargos')->with('deleted', 1);
	}
}