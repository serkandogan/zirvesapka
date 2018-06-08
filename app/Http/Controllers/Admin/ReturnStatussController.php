<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateReturnStatus;
use App\Http\Requests\UpdateReturnStatus;
use App\Models\ReturnStatus;

class ReturnStatussController extends AdminController {

	public function index() {

		$returnstatuss = ReturnStatus::orderBy('ID', 'DESC')->paginate(50);

		return view('admin.returnstatuss.index', compact('returnstatuss'));
	}

	public function create() {
		return view('admin.returnstatuss.create');
	}

	public function store(CreateReturnStatus $input) {
		ReturnStatus::create($input->all());

		return redirect('admin.admin/returnstatuss')->with('added', 1);
	}

	public function show($id) {
		$returnstatus = ReturnStatus::find($id);
		return view('admin.returnstatuss.show', compact('returnstatus'));
	}

	public function edit($id) {

		$returnstatus      = ReturnStatus::orderBy('Baslik', 'ASC')->find($id);

		return view('admin.returnstatuss.edit', compact('returnstatus'));

	}

	public function update($id, UpdateReturnStatus $input) {

		//dd($input->all());

		ReturnStatus::find($id)->fill($input->all())->save();

		return redirect('admin.admin/returnstatuss')->with('updated', 1);
	}

	public function destroy($id) {
		$returnstatus = ReturnStatus::find($id);
		$returnstatus->delete();

		return redirect('admin.admin/returnstatuss')->with('deleted', 1);
	}
}